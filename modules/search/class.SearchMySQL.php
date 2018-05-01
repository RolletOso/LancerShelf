<?php

//
// Class Name: SearchMySQL
//
// Author: Alex Miles (alex@studiogeek.co.uk)
//
// Short Description:
// This class allows you perform a simple search through
// a given MySQL database.
//
// PLEASE NOTE: This class was not designed with efficiency
// in mind. It is intended for use as a tool for quickly and
// easily finding useful information, such as configuration
// values, in an unfamiliar database.
//
// Use of this class on a production database is NOT RECOMMENDED.
// 
define('SEARCHMYSQL_TABLE_MODE_ALL',0);
define('SEARCHMYSQL_TABLE_MODE_EXCLUDE',1);
define('SEARCHMYSQL_TABLE_MODE_INCLUDE',2);

class SearchMySQL {
	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_name = 'projectalpha';
	private $db = null;
	private $tables = null;
	private $include_tables = array();
	private $exclude_tables = array();
	
	private $search_values = true;
	private $search_structure = false;
	
	function __destruct() {
		$this->closeConnection();
	}
	
	public function createConnection() {
		$this->db = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
	}
	
	public function closeConnection() {
		if(!is_null($this->db)) {
			$this->db->close();
		}
	}
	
	public function setConnectionDetails($host,$user,$pass,$dbname) {
		$this->db_host = $host;
		$this->db_user = $user;
		$this->db_pass = $pass;
		$this->db_name = $dbname;
	}
	
	public function excludeTable($str) {
		$str = trim($str);
		if($str!='') {
			$this->exclude_tables[] = $str;
		}
	}
	
	public function isExcluded($tbl) {
		return in_array($tbl,$this->exclude_tables);
	}
	
	public function includeTable($str) {
		$str = trim($str);
		if($str!='') {
			$this->include_tables[] = $str;
		}
	}

	public function isIncluded($tbl) {
		return in_array($tbl,$this->include_tables);
	}
	
	public function getTableMode() {
		if(count($this->include_tables)) {
			return SEARCHMYSQL_TABLE_MODE_INCLUDE;
		} else if(count($this->exclude_tables)) {
			return SEARCHMYSQL_TABLE_MODE_EXCLUDE;
		} else {
			return SEARCHMYSQL_TABLE_MODE_ALL;
		}
	}
	
	public function getTables() {
		if(is_null($this->tables)) {
			$this->tables = array();
			$this->db->real_query('SHOW TABLES');
			if($table_query = $this->db->use_result()) {
				while($table = $table_query->fetch_row()) {
					switch($this->getTableMode()) {
						case SEARCHMYSQL_TABLE_MODE_INCLUDE:
							if($this->isIncluded($table[0])) {
								$this->tables[] = $table[0];
							}
							break;
						case SEARCHMYSQL_TABLE_MODE_EXCLUDE:
							if(!$this->isExcluded($table[0])) {
								$this->tables[] = $table[0];
							}
							break;
						case SEARCHMYSQL_TABLE_MODE_ALL:
							$this->tables[] = $table[0];
							break;
					}
				}
				$table_query->free();
			}
		}
		return $this->tables;
	}
	
	public function search($str,$mysqli_db_obj = null) {
		
		if(is_null($mysqli_db_obj)) {
			if(is_null($this->db)) {
				$this->createConnection();
			}
		} else {
			$this->db = $mysqli_db_obj;
		}
		
		$results = array();
		
		foreach($this->getTables() as $s_table) {
			
			// Find the primary keys for this table
			$primary_keys = array();
			$sql = 'DESCRIBE `'.$s_table.'`';
			$this->db->real_query($sql);
			if($primary_key_query = $this->db->use_result()) {
				while($row = $primary_key_query->fetch_assoc()) {
					if($row['Key']=='PRI') {
						$primary_keys[] = $row['Field'];
					}
				}
				$primary_key_query->free();
			}
			
			// Now search the table
			$sql = 'SELECT * FROM `'.$s_table.'`';
			$this->db->real_query($sql);
			if($search_query = $this->db->use_result()) {
				while($row = $search_query->fetch_assoc()) {
					foreach($row as $field => $value) {
						if(!(strpos($value,$str)===false)) {
							$locate_sql = array();
							foreach($primary_keys as $k) {
								$locate_sql[] = '`'.$k.'`="'.$row[$k].'"';
							}
							$results[] = array(
								'value' => $value,
								'table' => $s_table,
								'field' => $field,
								'sql' => 'SELECT * FROM `'.$s_table.'` WHERE '.implode(' AND ',$locate_sql).';'
								);
						}
					}
				}
				$search_query->free();
			}
			
		}
		
		return $results;
		
	}
}