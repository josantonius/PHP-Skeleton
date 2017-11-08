<?php
/**
 * [FILE DESCRIPTION].
 *
 * @author    __Vendor__ <__email__>
 * @copyright __year__ (c) __Vendor__ - __PREFIX____Package__
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/__Vendor__/__PREFIX____Package__
 * @since     __version__
 */
namespace __Vendor__\__Package__;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for __Package__ library.
 *
 * @since __version__
 */
final class __Package__Test extends TestCase
{
    /**
     * __Package__ instance.
     *
     * @since __version__
     *
     * @var object
     */
    protected $__Package__;

    /**
     * Setup method.
     *
     * @since __version__
     */
    protected function setUp()
    {
        parent::setUp();
        $this->__Package__ = new __Package__;
    }

    /**
     * [METHOD DESCRIPTION].
     *
     * @since __version__
     *
     * @return [DATATYPE] → [DESCRIPTION]
     */
    public function testNew()
    {
        $actual = $this->__Package__;
        $this->assertInstanceOf('\__Vendor__\__Package__\__Package__', $actual);
    }
}
