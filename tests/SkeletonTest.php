<?php
/**
 * [FILE DESCRIPTION].
 *
 * @author    __Vendor__ <hello@__package__.com>
 * @copyright __year__ (c) __Vendor__ - PHP-__Package__
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/__Vendor__/PHP-__Package__
 * @since     1.0.0
 */
namespace __Vendor__\__Package__;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for __Package__ library.
 *
 * @since 1.0.0
 */
final class __Package__Test extends TestCase
{
    /**
     * [VAR DESCRIPTION].
     *
     * @since 1.0.0
     *
     * @var [TYPE]
     */
    protected $__Package__;

    /**
     * Setup.
     *
     * @since 1.0.0
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->__Package__ = new __Package__;
    }

    /**
     * [FUNCTION DESCRIPTION].
     *
     * @since 1.0.0
     *
     * @return [TYPE] → [DESCRIPTION]
     */
    public function testNew()
    {
        $actual = $this->__Package__;
        $this->assertInstanceOf('\__Vendor__\__Package__\__Package__', $actual);
    }
}
