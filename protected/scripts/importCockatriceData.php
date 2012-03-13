<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/26/11 1:00 PM
 * This file reads card information from Cockatrice's cards.xml and prints out a list of SQL statements that can be used
 * to generate an information database.
 */

include("../app/config.php");
include("../model/DatabaseHelper.php");

const __COCKATRICE_FILE = "cards.xml";
$xml = simplexml_load_file(__COCKATRICE_FILE);
$db  = DatabaseHelper::connect();

$setId = 1;
$setIds = array();
foreach($xml->sets->set as $set)
{
    $code = str_replace('"', "'", $set->name);
    $name = str_replace('"', "'", $set->longname);

    // Generate SQL to add sets to database.
    $query = "INSERT INTO infosets (`code`, `name`) VALUES (\"{$code}\", \"{$name}\");";
    print($query . "\n");

    $setIds["{$code}"] = $setId++;
}

die();

$cardId = 1;
$cardLines = array();
foreach($xml->cards->card as $card)
{
    $name     = str_replace('"', "'", $card->name);
    $manaCost = str_replace('"', "'", $card->manacost);
    $type     = str_replace('"', "'", $card->type);
    $pt       = str_replace('"', "'", $card->pt);
    $text     = str_replace('"', "'", $card->text);

    $query = "INSERT INTO infocards (`name`, `manaCost`, `type`, `pt`, `cardText`) VALUES (\"{$name}\", \"{$manaCost}\", \"{$type}\", \"{$pt}\", \"{$text}\");";
    print($query . "\n");

    $cardLines[$cardId] = array();
    $sets = $card->set;
    foreach($sets as $set)
    {
        $cardLines[$cardId][] = $setIds["{$set}"];
    }

    $cardId++;
}


for($i = 1; $i < $cardId; $i++)
{
    foreach($cardLines[$i] as $set)
    {
        $query = "INSERT INTO infocardlines (`cardId`, `setId`) VALUES (\"{$i}\", \"{$set}\");";
        print($query . "\n");
    }
}
