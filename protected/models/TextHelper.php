<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST
 */
 
class TextHelper
{
    /**
     * Returns card information for cardName, including its text and the sets it is from.
     * @static
     * @param string $cardName
     * @return array
     */
    static function getCardText($cardName)
    {
        $base = DatabaseHelper::connect();

        $statement = $base->prepare("SELECT * FROM infocards WHERE name=:name");
        $statement->execute(array(":name" => $cardName));

        $cardInfo = $statement->fetch(PDO::FETCH_ASSOC);

        $statement = $base->prepare("SELECT code, name FROM infosets WHERE id IN (SELECT setId FROM infocardlines WHERE cardId=:cardId)");
        $statement->execute(array(":cardId" => $cardInfo["id"]));

        $setNames = $statement->fetchAll(PDO::FETCH_ASSOC);

        $cardInfo = array("cardInfo" => $cardInfo, "sets" => $setNames);

        return $cardInfo;
    }
}
