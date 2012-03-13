<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-22 2:00pm EST
 */
 
class LogHelper
{
	/**
	 * Logs in the database a price search for the specified card. 
	 * @static
	 * @param string $cardName
	 * @param string $cardType
	 * @param int $startDate
	 * @param int $endDate
	 * @return void
	 */
	static function logCardSearch($cardName, $cardType, $startDate, $endDate, $ip)
	{
        $base = DatabaseHelper::connect();

        switch($cardType)
        {
            case "foil":
                $foil = 1;
                break;
            default:
                $foil = 0;
                break;
        }

		$results = $base->prepare("INSERT INTO searchlog (cardId, cardType, startDate, endDate, ip, timestamp)"
			                     . " VALUES ((SELECT id FROM cardnames WHERE name = :cardName), :cardType, :startDate, :endDate, :ip, :currentTime)");
        $results->execute(array(":cardName" => $cardName, ":cardType" => $foil, ":startDate" => $startDate, ":endDate" => $endDate, ":ip" => $ip, ":currentTime" => time()));
    }
}
