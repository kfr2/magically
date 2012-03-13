<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/20/11 11:19 AM
 */
?>
<div data-role="page" data-theme="a" id="textSearch">
    <div data-role="header">
        <a href="/" title="magically.us homepage" data-icon="home" rel="external">home</a>
        <h1>card text search</h1>
    </div>

    <div data-role="content">
        <form id="textSearchForm">
            <div data-role="fieldcontain">
                <label for="textCardName">name</label>
                <input type="text" id="textCardName" placeholder="card name">
            </div>

            <input data-role="fieldcontain" type="submit" id="doTextSearch" value="text search" data-theme="b">
        </form>
    </div>

    <div data-role="content" id="textData">
    </div>


    <?php
        include("pageFooter.tpl.php");
    ?>
</div>
