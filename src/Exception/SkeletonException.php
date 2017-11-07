<?php
/**
 * [FILE DESCRIPTION].
 *
 * @author    __Vendor__ <hello@__package__.com>
 * @copyright __year__ (c) __Vendor__ - PHP-__Package__
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/__Vendor__/PHP-__Package__
 * @since     1.0.0
 **/
namespace __Vendor__\__Package__\Exception;

/**
 * Exception class for __Package__ library.
 *
 * You can use an exception and error handler with this library.
 *
 * @since 1.0.0
 *
 * @link https://github.com/Josantonius/PHP-ErrorHandler
 */
class __Package__Exception extends \Exception
{
    /**
     * Exception handler.
     *
     * @since 1.0.0
     *
     * @param string $msg    → message error
     * @param int    $status → HTTP response status code
     *
     * @return void
     */
    public function __construct($msg = '', $status = 0)
    {
        $this->message    = $msg;
        $this->statusCode = $status;
    }
}
