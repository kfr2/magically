<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST 
 */
 
class TextController extends Controller
{

    /**
     * Executes the current request.
     */
    function execute()
    {
		$cardName = urldecode($this->getRequest()->cardName);
		$cardInfo = TextHelper::getCardText($cardName);

        switch($this->getFormat())
        {
            case "json":
                $this->getResponse()->cardInfo = json_encode($cardInfo);
                $this->getResponse()->render(ROOT_DIRECTORY . "/views/textData.json.tpl.php");
                break;
            case "html":
                $this->getResponse()->cardInfo = $cardInfo;
                $this->getResponse()->render(ROOT_DIRECTORY . "/views/textData.html.tpl.php");
                break;
            default:
                $this->getResponse()->redirect(BASE_URL);
                break;
        }
    }
}
