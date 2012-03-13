<?php
/**
 * turns a list from "select distinct names from cards" > names.txt into sql
 * insert statements for mtg_prices.db (names table)
 */

date_default_timezone_set("America/New_York");

if($argc < 3)
{
	die("Usage:  ./namesToSQL.php input output\n");
}

$input = file($argv[1], FILE_IGNORE_NEW_LINES);
$output = fopen($argv[2], "w");

$sql = "";
foreach($input as $line)
{
	$sql  .= "INSERT INTO names (\"name\") VALUES (\"{$line}\");\n";
}

fwrite($output, $sql);

print("Done.\n");
