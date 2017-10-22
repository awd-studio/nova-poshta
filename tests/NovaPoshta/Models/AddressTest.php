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
use NovaPoshta\Models\ModelBase;
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
     * ModelBase instance.
     *
     * @var Address $model
     */
    private $model;


    /**
     * Method ID.
     */
    const METHOD_ID = 'Address';


    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->model    = new Address($this->settings);
    }


    public function testAddressInstanceClass()
    {
        $this->assertInstanceOf(
          ModelBase::class,
          $this->model
        );
    }


    public function testAddressInstanceInterface()
    {
        $this->assertInstanceOf(
          AddressInterface::class,
          $this->model
        );
    }


    public function testGetModelId()
    {
        $this->assertEquals(self::METHOD_ID, $this->model->getModelId());
    }


    public function testAddress()
    {
        $address = Address::getBranches($this->settings);

        $this->assertInstanceOf(\stdClass::class, $address);
    }
}
