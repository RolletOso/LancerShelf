<?php

include('class.SearchMySQL.php');

define('SEARCH_TERM','maxwell');

$searcher = new SearchMySQL();

if(true) {
	// Ignore a boring table
	//$searcher->excludeTable('boring_table');
} else {
	// Only search these specific tables (exclusions will be ignored)
	$searcher->includeTable('users');
	//$searcher->includeTable('projects');
}

print_r($searcher->search(SEARCH_TERM));

unset($searcher);

//
// You can also pass the class your own database connection to use
//
$my_conn = new mysqli('localhost','root','','interesting_db');
$new_searcher = new SearchMySQL();
print_r($new_searcher->search(SEARCH_TERM,$my_conn));