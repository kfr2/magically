<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00 PM EST
 */



if(!isset($_GET['term']))
{
    die("Go to magically.us for more information!");
}

include("../protected/app/config.php");
include("../protected/models/DatabaseHelper.php");

$base = DatabaseHelper::connect();

$term = $_GET['term'];

$names = $base->prepare("SELECT id, name FROM cardnames WHERE name LIKE :term ORDER BY name LIMIT 5");
$names->execute(array(":term" => $term . "%"));

$return_array = array();

while($row = $names->fetch(PDO::FETCH_ASSOC))
{
	$row_array['id']    = $row['id'];
	$row_array['value'] = $row['name'];

	array_push($return_array, $row_array);
}

echo json_encode($return_array);
