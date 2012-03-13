<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     7/4/11 12:24 PM
 */
?>
<div data-role="page" data-theme="a" id="tradeComparator">
    <div data-role="header">
        <a href="/" title="magically.us homepage" data-icon="home" rel="external">home</a>
        <h1>trade comparator</h1>
    </div>

    <div data-role="content" id="cardAddition">
        <form id="cardAdditionForm">
            <div data-role="fieldcontain">
                <label for="cardName">card name</label>
                <input type="text" id="cardName" placeholder="card name">
            </div>

            <div data-role="fieldcontain">
                <label for="cardType">card type</label>
                <select data-role="slider" id="cardType">
                    <option value="normal" selected>normal</option>
                    <option value="foil">foil</option>
                </select>
            </div>

            <div data-role="fieldcontain">
                <label for="cardQuantity">quantity</label>
                <input type="range" id="cardQuantity" value="1" min="1" max="10">
            </div>

            <div data-role="fieldcontain">
                <label for="cardOwner">owner</label>
                <select data-role="slider" id="cardOwner">
                    <option value="ownCards" selected">me</option>
                    <option value="partnerCards">partner</option>
                </select>
            </div>

            <input data-role="fieldcontain" type="button" id="doCardAdd" value="add card" data-theme="b">
        </form>
    </div>

    <div data-role="content" id="error"></div>

    <div data-role="collapsible">
        <h1>ME</h1>
        <ul data-role="listview" data-theme="b" id="ownCards">
        </ul>
    </div>

    <div data-role="collapsible">
        <h1>PARTNER</h1>
        <ul data-role="listview" data-theme="b" id="partnerCards"></ul>
    </div>

    <div data-role="content" id="tradeComparison"></div>

    <?php
        include("pageFooter.tpl.php");
    ?>
</div>
