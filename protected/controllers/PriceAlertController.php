<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST
 */
 
class PriceAlertController extends Controller
{

    /**
     * Executes the current request.
     */
    function execute()
    {
        $email          = urldecode(SQLite3::escapeString($this->getRequest()->email));
		$cardName       = urldecode(SQLite3::escapeString($this->getRequest()->cardName));
		$cardType		= urldecode(SQLite3::escapeString($this->getRequest()->cardType));
        $priceDirection = urldecode(SQLite3::escapeString($this->getRequest()->priceDirection));
        $price          = urldecode(SQLite3::escapeString($this->getRequest()->price));

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);


		if($cardType == "normal")
		{
			$cardType = 0;
		}

		else
		{
			$cardType = 1;
		}

        if($priceDirection == "less")
        {
            $priceDirection = 0;
        }

		else
		{
            $priceDirection = 1;
        }

        $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


        if(AlertsHelper::insertAlert($email, $cardName, $cardType, $priceDirection, $price))
        {
            print("<h1 class=\"success\">An alert for {$cardName} has been set.</h1>");
        }

        else
        {
            print("<h1 class=\"error\">An error has occurred.  Try again soon!</h1>");
        }

    }
}
