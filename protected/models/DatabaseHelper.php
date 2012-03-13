<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST
 */
 
class DatabaseHelper
{
    /**
     * Connects to the application's PDO data source and returns a PDO object.
     * @static
     * @return PDO Object
     */
    static function connect()
    {
        try
        {
           $base = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }

        catch (PDOException $error)
        {
            print("Connection failed: " . $error->getMessage());
        }

        return $base;
    }

    /**
     * Describes this module.
     * @return string
     */
    function __toString()
    {
        return "This model connects the user to the PDO database.";
    }
}
