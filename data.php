<?php

$json = json_decode(file_get_contents('data.json'), true);

$total_rows = count($json);
$per_page = $_POST["perPage"] ?: 100;
$current_page = $_POST["currentPage"] ?: 1;

$sort = $_POST["sort"] ?: array(array( "column_0"=>"desc" ), array( "column_2"=>"asc" ));
$filter = $_POST["filter"] ?: array("column_0" => "foo");

$result = array(

  "totalRows"   => $total_rows,
  "perPage"     => $per_page,
  "sort"        => $sort,
  "filter"      => $filter,
  "currentPage" => $current_page,
  "data"        => array(),

  "posted"      => $_POST

);

foreach($json as $p) {	
	$result["data"][] = array(
		"app"  => $p['product']['name'],
		"plattform"  => ($p['product']['store'] == 'google_play' ? 'Android' : 'IOS'),
		"downloads"  => $p['downloads'],
		"updates"  => $p['updates'],
	);
}

// header('Content-type: text/json');
echo json_encode($result);
