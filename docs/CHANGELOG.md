Magically.US Changelog
======================
* Author:       Kevin Richardson <kevin@magically.us>
* Last update:  2011-Nov-13: 10:00pm EST

13-Nov-2011
-----------
* Rejoice, for Magic Traders started updating its pricelist again!
* Adding services to NFS again in hopes of utilizing the price database with a C# application.

13-Jul-2011
-----------
* Uploaded to NearlyFreeSpeech.NET and configured to use its services.
* Removed escapeString() from several input sections because it was causing
  conflicts with cards containing apostrophes.  These sections are using
  prepared inputs.
* Updated textSearch.tpl.php to have a form id of "textSearchForm."
* Updated js/script.js so the various forms should work if the user hits
  enter in addition to clicking the respective buttons. 

8-Jul-2011
----------
* Began migrating hosting to NearlyFreeSpeech.NET.

4-Jul-2011
----------
* Data is now migrated to MySQL.
* Began converting models over to using DatabaseHelper and the PDO model.


3-Jul-2011
----------
* Switched time column of cards table to a timestamp (timestamp column).
* Massively increased efficiency of price insertion by utilizing transactions.
* Added foil field to the price alerts view, controller, and model.
* Began converting databases from SQLite -> MySQL.
  * Created a DatabaseHelper to utilize this new database through PDO.

2-Jul-2011
----------
* Changed 404 page style.
* Worked on price alert checking script.
* Corrected error in PriceAlertController related to it stripping any decimal values from the input price.

1-Jul-2011
----------
* Modified importPriceData to import faster by making significantly less SQL calls.  This is done by storing names => ids
  in an array.

30-Jun-2011
-----------
* Finished converting price database over to using cardIds (and a corresponding names table) instead of storing the name each time.
* Modified all relevant scripts to use this new structure.
* Began writing scripts for importing backlogged price data.

27-Jun-2011
-----------
* Added boolean "foil" field to the prices database (so we no longer need to have separate DBs for foil/nonfoil).
* Modified StatisticsHelper to use the new table instead of the two previous ones.
* Wrote script to import old entries into new prices DB.

26-Jun-2011
-----------
* Completed price alerts and card text.

21-Jun-2011
-----------
* Began creating price search view for data retrieval.
* Updated to jQuery mobile beta v 1.
* Moved JavaScript files to the end of the files.

20-Jun-2011
------------
* Began creating Magically.us.
* Decided to utilize jQuery mobile for most of the heavy lifting/easy theme creation.
* Wrote main index page with links to (forthcoming) pages.
* Moved from utilizing jQuery mobile's CDN for loading the script and css because it occasionally seemed unresponsive.
* Moved javascript to beginning of file because scripts wouldn't work properly otherwise.
