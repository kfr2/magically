<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-22 2:30pm EST
 */
 
class StatisticsHelper
{
    /**
     * Returns price information for cardName of cardType.
	 * Options for cardType are "normal" or "foil."
	 * startDate and endDate are unix timestamps.
     * @static
     * @param string $cardName
     * @param string $cardType
	 * @param int $startDate
	 * @param int $endDate
     * @return array
     */
    static function getCardData($cardName, $cardType, $startDate, $endDate)
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

		// If endDate is 0, show price records up to the current second.
		if($endDate == 0) { $endDate = time(); }

        $results = $base->prepare("SELECT * FROM cardprices WHERE cardId = (SELECT id FROM cardnames WHERE name = :cardName) "
                                . " AND foil = :foil AND timestamp BETWEEN :startDate AND :endDate ORDER BY id");
        $results->execute(array(":cardName" => $cardName, ":foil" => $foil, ":startDate" => $startDate, ":endDate" => $endDate));

        $return_array = array();

        while($row = $results->fetch(PDO::FETCH_ASSOC))
        {
	        $row_array["id"]        = $row["id"];
            $row_array["price"]     = $row["price"];
            $row_array["stddev"]    = $row["stddev"];
	        $row_array["average"]   = $row["average"];
	        $row_array["high"]      = $row["high"];
	        $row_array["low"]       = $row["low"];
	        $row_array["change"]    = $row["change"];
            $row_array["rawN"]      = $row["rawN"];
            $row_array["date"]      = $row["timestamp"];

	        array_push($return_array, $row_array);
        }

        return $return_array;
    }
}
