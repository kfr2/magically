<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     2011-Nov-13 10:00pm EST 
 */

/**
 * This module formats data for output to the user.
 */
class FormattingHelper
{
    /**
     * Converts the specified number to a US-formatted currency format.
     * @static
     * @param String $amount
     * @return String
     */
    static function toCurrency($amount)
    {
       return "$" . number_format((double) $amount, 2);
    }


    /**
     * Describes this module.
     * @return string
     */
    function __toString()
    {
        return "This module assists in formatting data for output to users.";
    }
}
