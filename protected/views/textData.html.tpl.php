<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/21/11 9:59 AM
 */
$cardInfo = $this->cardInfo;

if(!$cardInfo["cardInfo"])
{
    die("Text data does not exist for the specified card.");
}

$cardName = $cardInfo["cardInfo"]["name"];
$cardType = $cardInfo["cardInfo"]["type"];
$manaCost = $cardInfo["cardInfo"]["manaCost"];
$pt       = $cardInfo["cardInfo"]["pt"];
$cardText = str_replace("\n", "<br>", $cardInfo["cardInfo"]["cardText"]);

$sets     = $cardInfo["sets"];
?>
<table class="prices">
    <caption><?php print($cardName); ?></caption>
    <tbody>
        <tr>
            <th>type:</th>
            <td><?php print($cardType); ?></td>
        </tr>
        <tr>
            <th>cost:</th>
            <td><?php print($manaCost); ?></td>
        </tr>
        <tr>
            <th>text:</th>
            <td><?php print($cardText); ?></td>
        </tr>
<?php
    if($pt != "")
        {
?>
        <tr>
            <th>p/t:</th>
            <td><?php print($pt); ?></td>
        </tr>
<?php
        }
        ?>
        <tr>
            <th>sets:</th>
            <td><?php 
			$i = 0;
			foreach($sets as $set)
			{
				print($set["name"]); 

				if($i++ != count($sets) - 1)
				{
					print(", ");
				}
			}
	?></td>
        </tr>
    </tbody>
</table>
