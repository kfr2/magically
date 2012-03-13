<?php

/**
 * User: Kevin Richardson <kevin@magically.us>
 * The main routing controller for magically.us.  It utilizes klein.php (https://github.com/chriso/klein.php)
 * Updated: 12-Jul-2011 12:00am EST
 */

require("../protected/app/klein.php");
require("../protected/app/config.php");

function __autoload($className)
{
    if(file_exists("../protected/models/{$className}.php"))
    {
        require("../protected/models/{$className}.php");
    }

    else
    {
        require("../protected/controllers/{$className}.php");
    }
}

/**
 * Show the price search page.
 */
respond(BASE_DIR . "/pricesearch/", function($request, $response)
{
    $response->title = "price search";
    $response->render(ROOT_DIRECTORY . "/views/header.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/priceSearch.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/footer.tpl.php");
});

/**
 * Display card pricing information based on the card's type.
 * Exports in HTML and JSON formats.
 */
respond(BASE_DIR . "/pricedata/[:cardName]/[:type]/[:startDate]/[:endDate]/[:output]", function($request, $response)
{
    require(ROOT_DIRECTORY . "/controllers/PriceController.php");
    $controller = new PriceController();

    $controller->setRequest($request);
    $controller->setResponse($response);
    $controller->setFormat($request->output);
    $controller->execute();
});

/**
 * Display the trade comparator tool.
 */
respond(BASE_DIR . "/tradecomparator/", function($request, $response)
{
    $response->title = "trade comparator";
    $response->render(ROOT_DIRECTORY . "/views/header.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/tradeComparator.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/footer.tpl.php");
});

/**
 * Display card text information based on the card's name.
 * Exports in HTML and JSON formats.
 */
respond(BASE_DIR . "/textdata/[:cardName]/[:output]", function($request, $response)
{
    require(ROOT_DIRECTORY . "/controllers/TextController.php");
    $controller = new TextController();

    $controller->setRequest($request);
    $controller->setResponse($response);
    $controller->setFormat($request->output);
    $controller->execute();
});

/**
 * Display the card text search form.
 */
respond(BASE_DIR . "/cardtext/", function($request, $response)
{
    $response->title = "search for a card's text";
    $response->render(ROOT_DIRECTORY . "/views/header.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/textSearch.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/footer.tpl.php");
});

/**
 * Display form for establishing a price alert.
 */
respond(BASE_DIR . "/alerts/", function($request, $response)
{
    $response->title = "add a price alert";
    $response->render(ROOT_DIRECTORY . "/views/header.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/priceAlert.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/footer.tpl.php");
});

/**
 * Process posting of a new price alert.
 */
respond(BASE_DIR . "/alerts/[:email]/[:cardName]/[:cardType]/[:priceDirection]/[:price]", function($request, $response)
{
    require(ROOT_DIRECTORY . "/controllers/PriceAlertController.php");
    $controller = new PriceAlertController();

    $controller->setRequest($request);
    $controller->setResponse($response);
    $controller->execute();

});

/**
 * Track any referrals.
 */
respond(BASE_DIR . "/r/[:referrer]", function($request, $response)
{
    // log the referrer

    $response->redirect(BASE_URL);
});

/**
 * Show the index page to the user should he or she arrive at the base url.
 */
/*respond(BASE_DIR . "/", function($request, $response)
{
    $response->title = "your source for Magic: the Gathering card prices";
    $response->render(ROOT_DIRECTORY . "/views/header.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/dashboard.tpl.php");
    $response->render(ROOT_DIRECTORY . "/views/footer.tpl.php");
});*/
respond(BASE_DIR . "/", function($request, $response)
{
	print("Magically 2.0 is coming sometime soon!  Stay tuned.");
});


/**
 * Finally, handle any 404 errors that may occur.
 */
respond("*", function($request, $response, $app, $matched)
{
    if(!$matched)
    {
        $response->title = "page not found";
        $response->render(ROOT_DIRECTORY . "/views/header.tpl.php");
        $response->render(ROOT_DIRECTORY . "/views/404.tpl.php");
        $response->render(ROOT_DIRECTORY . "/views/footer.tpl.php");
    }
});

dispatch();
