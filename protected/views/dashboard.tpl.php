<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/19/11 6:39 PM
 */
?>
<div data-role="page" data-theme="a" id="home">
    <div data-role="header">
        <h1>magically.us</h1>
    </div>

    <div data-role="content">
        <ul data-role="listview" data-theme="b">
            <li><a rel="external" href="/pricesearch/" title="search for the latest card prices">price search</a></li>
<!--            <li><a rel="external" href="/tradecomparator/" title="compare the values exchanged during a trade">trade comparator</a></li> -->
            <li><a rel="external" href="/alerts/" title="card price alerts">price alerts</a></li>
<!--            <li><a rel="external" href="/trends/" title="latest card pricing trends">price trends</a></li> -->
<!--            <li><a rel="external" href="/buyprices/" title="search buy list prices">buy list prices</a></li> -->
            <li><a rel="external" href="/cardtext/" title="retrieve a card's text">card text</a></li>
        </ul>
    </div>

    <?php
        include("pageFooter.tpl.php");
    ?>
</div>
