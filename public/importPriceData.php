<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     11/22/11 1:29 PM EST
 * This file reads card information from the specified input files and imports the prices into the prices table.
 */

include("../protected/app/config.php");
include("../protected/models/DatabaseHelper.php");

$key = "i8cYNpNb";
if(!isset($_GET["key"]) || $_GET["key"] != $key)
{
    header("Location: /");
    die();
}

$updateFile = "lastUpdate.txt";

$normalInput = "http://www.magictraders.com/pricelists/current-magic-excel.txt";
$foilInput   = "http://www.magictraders.com/pricelists/current-magic-foils-excel.txt";

$normalPrices = file($normalInput) or die("Error opening normal price list.\n");
$foilPrices   = file($foilInput) or die("Error opening foil price list.\n");

$base = DatabaseHelper::connect();

/**
 * Get a list of card names->ids.
 */
$statement = $base->prepare("SELECT id, name FROM cardnames");
$statement->execute();

$names = $statement->fetchAll(PDO::FETCH_ASSOC);

$ids = array();
foreach($names as $name)
{
    $cardId   = $name["id"];
    $cardName = $name["name"];

    $ids[$cardName] = $cardId;
}

for($i = 0; $i < 2; $i++)
{
    switch($i)
    {
        case 0:
            $fileType = $normalPrices;
            $foil     = 0;
            break;
        default:
            $fileType = $foilPrices;
            $foil     = 1;
            break;
    }

    $j = 0;

//    $base->beginTransaction();

    foreach($fileType as $line)
    {
        if($j++ != 0)
        {
            $parts  = explode("|", $line);

        $name   = $parts[0];
        $price  = $parts[1];
        $stdDev = $parts[2];
        $avg    = $parts[3];
        $high   = $parts[4];
        $low    = $parts[5];
     	$change = $parts[6];
      	$rawN   = $parts[7];
    	$time   = time();

            // if the card name does not exist in the array, add it (and capture the id)
            if(!isset($ids[$name]))
            {
                $statement = $base->prepare("INSERT INTO cardnames (name) VALUES (:name)");
                $statement->execute(array(":name" => $name));

                $statement = $base->prepare("SELECT id FROM cardnames WHERE name=:name");
                $statement->execute(array(":name" => $name));

                $info = $statement->fetch(PDO::FETCH_ASSOC);
                $cardId = $info["id"];

                $ids[$name] = $cardId;
            }

            $cardId = $ids[$name];

            $output = ($foil == true) ? "foil" : "regular";

            //print("Importing data for {$output} {$name}...<br>");


            $insert = "INSERT INTO cardprices (`cardId`, `price`, `stddev`, `average`, `high`, `low`, `change`, `rawN`, `timestamp`, `foil`) VALUES "
                    . "(:cardId, :price, :stddev, :average, :high, :low, :change, :rawN, :time, :foil)";

            $statement = $base->prepare($insert);
            $statement->execute(array(":cardId" => $cardId, ":price" => $price, ":stddev" => $stdDev, ":average" => $avg,
                                   ":high" => $high, ":low" => $low, ":change" => $change, ":rawN" => $rawN, ":time" => $time,
                                   ":foil" => $foil)) or die("Error inserting price record for {$name}." . var_dump($statement->errorInfo()));
        }
    }

//    $base->commit();
}

// Log the price import in $updateFile
$currentTime = time();
$fh = fopen($updateFile, "w");
fwrite($fh, $currentTime);
fclose($fh);

print("Done importing data.");
