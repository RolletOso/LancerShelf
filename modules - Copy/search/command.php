<?php

//
// USAGE:
//
// $ php command.php
//			-h hostname
// 			-u username
// 			-p password
// 			-d database
// 			[--include-tables table1 ... tablen]
//			[--exclude-tables table1 ... tablen]
// 			--search "search string"
//

include('class.SearchMySQL.php');

define('PREVIEW_PAD',25);
define('PARAM_EXCLUDE',0);
define('PARAM_INCLUDE',1);
define('PARAM_SEARCH',2);

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'projectalpha';
$params = array(
	PARAM_EXCLUDE => array(),
	PARAM_INCLUDE => array(),
	PARAM_SEARCH => array()
	);

if($argv[0] == substr(__FILE__,( strlen($argv[0]) * -1))) {
	array_shift($argv);
}

$current_action = null;
for($i = 0, $j = count($argv); $i < $j; $i++) {
	switch($argv[$i]) {
		case '-h': // host
			$i++;
			$host = $argv[$i];
			$current_action = null;
			break;
		case '-u': // user
			$i++;
			$user = $argv[$i];
			$current_action = null;
			break;
		case '-p': // password
			$i++;
			$password = $argv[$i];
			$current_action = null;
			break;
		case '-d': // database
			$i++;
			$database = $argv[$i];
			$current_action = null;
			break;
		case '--exclude-tables':
			$current_action = PARAM_EXCLUDE;
			break;
		case '--include-tables':
			$current_action = PARAM_INCLUDE;
			break;
		case '--search':
			$current_action = PARAM_SEARCH;
			break;
		default:
			if(!($current_action === null)) {
				$params[$current_action][] = $argv[$i];
			} else {
				echo 'Invalid parameter: '.$argv[$i]."\n";
				exit;
			}
			break;
	}
}

if(!count($params[PARAM_SEARCH])) {
	echo 'No search string given.';
	exit;
}

$search_string = implode(' ',$params[PARAM_SEARCH]);

$searcher = new SearchMySQL();

foreach($params[PARAM_EXCLUDE] as $exclude_table) {
	$searcher->excludeTable($exclude_table);
}
foreach($params[PARAM_INCLUDE] as $include_table) {
	$searcher->includeTable($include_table);
}

$searcher->setConnectionDetails($host, $user, $password, $database);

$results = $searcher->search($search_string);

foreach($results as $result) {
	echo 'Value: ';
	$pos = strpos($result['value'],$search_string);
	
	 $start_index = 0;
	
	if(strlen($result['value'])>(strlen($search_string) + (PREVIEW_PAD*2) )) {
		if($pos >=PREVIEW_PAD) {
			$start_index = $pos - PREVIEW_PAD;
			echo '... ';
		}
		echo substr($result['value'],$start_index,strlen($search_string)+PREVIEW_PAD);
		if( ( $pos + strlen($search_string) + PREVIEW_PAD ) < ( strlen($result['value']) - 1 - $start_index ) ) {
			echo ' ...';
		}
	} else {
		// No padding required
		echo $result['value'];
	}
	echo "\n";
	
	echo 'Table: '.$result['table']."\n";
	echo 'Field: '.$result['field']."\n";
	echo 'PK Query: '.$result['sql']."\n\n";
}

echo count($results).' result'.(count($results)==1 ? '' : 's').'.'."\n";
