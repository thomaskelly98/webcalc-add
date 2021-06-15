<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header("Content-type: application/json");
require('functions.inc.php');

$output = array(
	"error" => false,
	"string" => "",
	"answer" => 0
);

$x = $_REQUEST['x'];
$y = $_REQUEST['y'];

// ensure x and y params exist
if (is_null($x) || $x == "") {
	$output["error"] = true;
	$output['string']= "Param x is missing";
	echo json_encode($output);
	exit;
}
if (is_null($y) || $y == "") {
	$output["error"] = true;
	$output['string']= "Param y is missing";
	echo json_encode($output);
	exit;
}

// ensure x and y are integers
if (!is_numeric($x)) {
	$output["error"] = true;
	$output['string']= "Param x is not an integer";
	echo json_encode($output);
	exit;
}
if (!is_numeric($y)) {
	$output["error"] = true;
	$output['string']= "Param y is not an integer";
	echo json_encode($output);
	exit;
}

$answer=add($x,$y);

$output['string']=$x."+".$y."=".$answer;
$output['answer']=$answer;

echo json_encode($output);
exit();
