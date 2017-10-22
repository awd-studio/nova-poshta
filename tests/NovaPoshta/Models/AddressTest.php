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


    public function testAddressGetRequiredPropertiesException()
    {
        $this->expectException(NpException::class);

        $NewAddress = new Address($this->settings);
        $NewAddress->searchSettlementStreets([]);
    }


    public function testAddressGetWarehouses()
    {
        $response = $this->model->getWarehouses();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testAddressGetCities()
    {
        $response = $this->model->getCities();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testAddressGetAreas()
    {
        $response = $this->model->getAreas();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testAddressGetWarehouseTypes()
    {
        $response = $this->model->getWarehouseTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testAddressSearchSettlements()
    {
        $response = $this->model->searchSettlements(['CityName' => 'val']);

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


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
