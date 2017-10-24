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


use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Http\Response;
use NovaPoshta\Models\Address;
use NovaPoshta\Models\AddressInterface;
use NovaPoshta\Models\ModelBase;
use NovaPoshta\Settings\Settings;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressTest
 *
 * @package NovaPoshta\Tests\Models
 */
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


    /**
     * Settings up.
     */
    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->model    = new Address($this->settings);
    }


    /**
     * @inheritdoc
     */
    public function testAddressInstanceClass()
    {
        $this->assertInstanceOf(
          ModelBase::class,
          $this->model
        );
    }


    /**
     * @inheritdoc
     */
    public function testAddressInstanceInterface()
    {
        $this->assertInstanceOf(
          AddressInterface::class,
          $this->model
        );
    }


    /**
     * @covers \NovaPoshta\Models\Address::getModelId
     */
    public function testAddressGetModelId()
    {
        $this->assertEquals(self::METHOD_ID, $this->model->getModelId());
    }


    /**
     * @covers \NovaPoshta\Models\Address::getBranches
     */
    public function testAddress()
    {
        $address = Address::getBranches($this->settings);

        $this->assertInstanceOf(\stdClass::class, $address);
    }


    /**
     * @covers \NovaPoshta\Models\Address::searchSettlementStreets
     */
    public function testAddressGetRequiredPropertiesException()
    {
        $this->expectException(NpException::class);

        $NewAddress = new Address($this->settings);
        $NewAddress->searchSettlementStreets([]);
    }


    /**
     * @covers \NovaPoshta\Models\Address::getWarehouses
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressGetWarehouses()
    {
        $response = $this->model->getWarehouses();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::getCities
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressGetCities()
    {
        $response = $this->model->getCities();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::getAreas
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressGetAreas()
    {
        $response = $this->model->getAreas();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::getWarehouseTypes
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressGetWarehouseTypes()
    {
        $response = $this->model->getWarehouseTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::searchSettlements
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressSearchSettlements()
    {
        $response = $this->model->searchSettlements(['CityName' => 'val']);

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::searchSettlementStreets
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressSearchSettlementStreets()
    {
        $response = $this->model->searchSettlementStreets([
          'StreetName'    => 'val',
          'SettlementRef' => 'val',
          'Limit'         => 'val',
        ]);

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::getStreet
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressGetStreet()
    {
        $response = $this->model->getStreet([
          'CityRef' => 'val',
        ]);

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Address::getSettlements
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testAddressGetSettlements()
    {
        $response = $this->model->getSettlements([]);

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }
}
