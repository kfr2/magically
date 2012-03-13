<?php
/**
 * Author:	Kevin Richardson <kevin@magically.us>
 * Updated: Sun 06/19/2011 
 */

/**
 * This software's version.
 */
const APP_VERSION = "2011-Jul-15 4:55:09 PM GMT";

/**
 * The base URL of this application.
 */
const BASE_URL = "http://magically.us/";

/**
 * The subdirectory this installation is located within.  "" if none.
 */
const BASE_DIR = "";

/**
 * The base location (on disk) of this software's root directory.
 */
const ROOT_DIRECTORY = "/f5/magicallyus/protected";

/**
 * MySQL process information.
 */
const DB_DSN      = "mysql:dbname=magically;host=magically.db";
const DB_USERNAME = "notarealuser";
const DB_PASSWORD = "notarealpassword";

/**
 * The timezone identifier of this server.
 * See http://us3.php.net/manual/en/timezones.php
 */

const TIMEZONE_IDENTIFIER = "America/New_York";

date_default_timezone_set(TIMEZONE_IDENTIFIER);
