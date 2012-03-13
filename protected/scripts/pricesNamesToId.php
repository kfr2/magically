<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/28/11 11:11 AM
 * Converts the name field of the price table to reference the cardId in the names table.
 */

require("../app/config.php");

$base   = new PDO("sqlite:" . ROOT_DIRECTORY . "/databases/mtg_prices.db3");
$base2  = new PDO("sqlite:" . ROOT_DIRECTORY . "/databases/mtg_prices_2.db3");
$output = fopen(ROOT_DIRECTORY . "/databases/cardInfo.sql", "w");

$statement = $base2->prepare("SELECT * from names");
$statement->execute();

// Go through each card name/id and modify the cards table accordingly.
while($result = $statement->fetch(PDO::FETCH_ASSOC))
{
    $name = $result["name"];
    $id   = $result["id"];

    print("Importing {$name}...\n");

    $cards = $base->prepare("SELECT * FROM cards WHERE name=:name");
    $cards->execute(array(":name" => $name));

    while($card = $cards->fetch(PDO::FETCH_ASSOC))
    {
        $price  = $card["price"];
        $stdDev = $card["stddev"];
        $avg    = $card["average"];
        $high   = $card["high"];
        $low    = $card["low"];
        $change = $card["change"];
        $rawN   = $card["rawN"];
        $time   = $card["time"];
        $foil   = $card["foil"];

        $query = "INSERT INTO cards (\"cardId\", \"price\", \"stddev\", \"average\", \"high\", \"low\", \"change\", \"rawN\", "
               . "\"time\", \"foil\") VALUES (\"{$id}\", \"{$price}\", \"{$stdDev}\", \"{$avg}\", \"{$high}\", \"{$low}\", "
               . "\"{$change}\", \"{$rawN}\", \"{$time}\", \"{$foil}\");\n";

        fwrite($output, $query);
    }
}

print("Finished importing data.");




