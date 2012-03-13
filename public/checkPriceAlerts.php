<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00 PM EST
 */

include("../protected/app/config.php");
include("../protected/models/DatabaseHelper.php");

$key = "1xP96xSF";
if(!isset($_GET["key"]) || $_GET["key"] != $key)
{
    header("Location: /");
    die();
}

$base = DatabaseHelper::connect();

$alertInfo = $base->prepare("SELECT * FROM priceAlerts");
$alertInfo->execute();

// Check each record to see if it is appropriate to send the user an alert.
foreach($alertInfo->fetchAll(PDO::FETCH_ASSOC) as $row)
{
    $id        = $row["id"];
    $cardId    = $row["cardId"];
    $foil      = $row["foil"];
    $price     = $row["price"];
    $direction = $row["priceDirection"];
    $email     = $row["email"];


    if($direction == "0")
    {
        $direction = "<";
    }

    else
    {
        $direction = ">";
    }


    $info = $base->prepare("SELECT timestamp FROM cardprices WHERE cardId=:cardId AND price {$direction} :price AND foil=:foil ORDER BY id DESC LIMIT 1");
	$info->execute(array(":cardId" => $cardId, ":price" => $price, ":foil" => $foil));

	$foil = ($foil == 0) ? "normal":"foil";

    $time = $info->fetch(PDO::FETCH_BOTH);

    print("Seeing if {$foil} {$cardId} is {$direction} {$price}...<br>");

    if($time)
    {
        $date = date("Y-m-d", $time[0]);

        // See if the date matches today (or yesterday).  If so, alert the user and delete the alert.
        if($date == date("Y-m-d", time()) || $date == date("Y-m-d", time() - 86400))
        {
            $message = <<< EOT
Greetings from Magically.US!

We are writing to let you know {$foil} {$cardName}'s price has gone (above/below) ${$price}.

Happy trading!
--Magically.US
EOT;

            mail($email, "Magically.US Price Alert", $message);

            // Delete the alert from the database.
            $base->exec("DELETE FROM pricealerts WHERE id={$id}");

            print("<em>* An alert has been sent to {$email}.</em><br>");
        }
    }
}

print("Done checking price alerts.<br>");

 
