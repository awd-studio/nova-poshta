<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests\Models;


use NovaPoshta\Models\Address;
use NovaPoshta\Models\AddressInterface;
use NovaPoshta\Models\Model;
use NovaPoshta\Settings\Settings;
use PHPUnit\Framework\TestCase;

final class AddressTest extends TestCase
{

    /**
     * Settings instance.
     *
     * @var Settings $settings
     */
    private $settings;


    /**
     * An API key.
     *
     * @var string
     */
    private $key = 'myAPIkey';


    /**
     * Model instance.
     *
     * @var Address $address
     */
    private $address;


    /**
     * Method ID.
     */
    const METHOD_ID = 'Address';


    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->address  = new Address($this->settings);
    }


    public function testAddressInstance()
    {
        $this->assertInstanceOf(
          Model::class,
          $this->address
        );

        $this->assertInstanceOf(
          AddressInterface::class,
          $this->address
        );
    }


    public function testAddressModel()
    {
        $this->assertEquals($this->address->getModelId(), self::METHOD_ID);
    }


    public function testAddress()
    {
        $address = Address::getBranches($this->settings);

        $this->assertInstanceOf(\stdClass::class, $address);
    }
}
