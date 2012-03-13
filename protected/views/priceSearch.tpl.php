<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/20/11 11:19 AM
 */
?>
<div data-role="page" data-theme="a" id="priceSearch">
    <div data-role="header">
        <a href="/" title="magically.us homepage" data-icon="home" rel="external">home</a>
        <h1>price search</h1>
    </div>

    <div data-role="content">
        <form id="priceSearchForm">
            <div data-role="fieldcontain">
                <label for="cardName">name</label>
                <input type="text" id="cardName" placeholder="card name">
            </div>

            <div data-role="fieldcontain">
                <label for="cardType">card type</label>
                <select data-role="slider" id="cardType">
                    <option value="normal" selected="selected">normal</option>
                    <option value="foil">foil</option>
                </select>
            </div>

            <input data-role="fieldcontain" type="submit" id="doPriceSearch" value="price search" data-theme="b">
        </form>
    </div>

    <div data-role="content" id="priceData">
    </div>


    <?php
        include("pageFooter.tpl.php");
    ?>
</div>
