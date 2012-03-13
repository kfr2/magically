<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST
 */
 
class PriceController extends Controller
{

    /**
     * Executes the current request.
     */
    function execute()
    {
        $cardName  = urldecode($this->getRequest()->cardName);
		$cardType  = $this->getRequest()->type;
		$startDate = $this->getRequest()->startDate;
		$endDate   = $this->getRequest()->endDate;

		// Get the card data.
        $this->getResponse()->cardType   = $cardType;
		$this->getResponse()->statistics = StatisticsHelper::getCardData($cardName, $cardType, $startDate, $endDate);

		$ip = $_SERVER['REMOTE_ADDR'];

		// Log the search for the card.
		LogHelper::logCardSearch($cardName, $cardType, $startDate, $endDate, $ip);

        switch($this->getFormat())
        {
            case "json":
                $this->getResponse()->statistics = json_encode($this->getResponse()->statistics);
                $this->getResponse()->render(ROOT_DIRECTORY . "/views/priceData.json.tpl.php");
                break;
            case "html":
                $this->getResponse()->cardName = $cardName;
                $this->getResponse()->render(ROOT_DIRECTORY . "/views/priceData.html.tpl.php");
                break;
            default:
                $this->getResponse()->redirect(BASE_URL);
                break;
        }
    }
}
