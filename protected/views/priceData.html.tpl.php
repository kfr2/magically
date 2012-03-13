<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/21/11 9:59 AM
 */
$cardName = $this->cardName;
$cardType = $this->cardType;
$statistics = $this->statistics;

$count = count($statistics) - 1;
if($count == -1)
{
    die("Price data does not exist for the specified card.");
}
$min = $statistics[$count]["low"];
$avg = $statistics[$count]["average"];
$max = $statistics[$count]["high"];

$values = array();
for($i = 0; $i <= $count; $i++)
{
    $values[] = $statistics[$i]["average"];
}
?>
<table class="prices">
    <caption><?php print($cardName); if($cardType == "foil"){ print(" (foil)"); }?></caption>
    <tbody>
        <tr class="min">
            <th>min:</th>
            <td class="price"><?php print(FormattingHelper::toCurrency($min)); ?></td>
        </tr>
        <tr class="avg">
            <th>avg:</th>
            <td class="price"><?php print(FormattingHelper::toCurrency($avg)); ?></td>
        </tr>
        <tr class="max">
            <th>max:</th>
            <td class="price"><?php print(FormattingHelper::toCurrency($max)); ?></td>
        </tr>
    </tbody>
</table>

<div class="inlinesparkline"><?php print(implode($values, ",")); ?></div>
