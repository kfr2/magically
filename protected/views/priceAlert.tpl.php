<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/23/11 10:00 PM
 */
?>
<div data-role="page" data-theme="a" id="priceAlert">
    <div data-role="header">
        <a href="/" title="magically.us homepage" data-icon="home" rel="external">home</a>
        <h1>create price alert</h1>
    </div>

    <div data-role="content">
        <form id="priceAlertForm">
            <div data-role="fieldcontain">
                <label for="emailAddress">send</label>
                <input type="text" id="emailAddress" placeholder="email address">
            </div>

            <div data-role="fieldcontain">
                <label for="cardName">an email when</label>
                <input type="text" id="cardName" placeholder="card name">
			</div>

			<div data-role="fieldcontain">
				<label for="cardType">of type</label>
				<select data-role="slider" id="cardType">
					<option value="normal" selected>normal</option>
					<option value="foil">foil</option>
				</select>
			</div>

            <div data-role="fieldcontain">
                <label for="priceDirection">costs</label>
                <select data-role="slider" id="priceDirection">
                    <option value="less" selected="selected">less</option>
                    <option value="more">more</option>
                </select>
            </div>

            <div data-role="fieldcontain">
                <label for="price">than</label>
                <input type="text" id="price" placeholder="price">
            </div>

            <input data-role="fieldcontain" type="submit" id="doPriceAlert" value="set price alert" data-theme="b">

        </form>
    </div>

    <div data-role="content" id="alertStatus">
    </div>


    <?php
        include("pageFooter.tpl.php");
    ?>
</div>
