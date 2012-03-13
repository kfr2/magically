<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST 
 */
 
class AlertsHelper
{
    /**
     * Inserts an alert with provided information into the alerts table of the database.
     * @static
     * @param string $email
	 * @param string $cardName
	 * @param boolean $foil
     * @param boolean $priceDirection
     * @param float $price
     * @return boolean
     */
    static function insertAlert($email, $cardName, $foil, $priceDirection, $price)
    {
        $base = DatabaseHelper::connect();

        $statement = $base->prepare("SELECT id FROM infocards WHERE name=:name");
        $statement->execute(array(":name"=>$cardName));

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$result)
        {
            die("<h1 class=\"error\">You have entered an invalid card name.</h1>");
        }

        $cardId = $result["id"];

        $statement = $base->prepare("INSERT INTO pricealerts (email, cardId, foil, priceDirection, price, timestamp)"
                                  . " VALUES (:email, :cardId, :foil, :priceDirection, :price, UNIX_TIMESTAMP(NOW()));");
        $result = $statement->execute(array(":email"=>$email, ":cardId"=>$cardId, ":foil"=>$foil, ":priceDirection"=>$priceDirection,
                                            ":price"=>$price));

        return $result;
    }
}
