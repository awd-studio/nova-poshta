<?php
/**
 * Created by PhpStorm.
 * User: awd
 * Date: 20.10.17
 * Time: 8:46
 */

namespace NovaPoshta\Tests\Models;

use NovaPoshta\Http\Response;
use NovaPoshta\Models\Common;
use NovaPoshta\Models\CommonInterface;
use NovaPoshta\Models\ModelBase;
use NovaPoshta\Settings\Settings;
use PHPUnit\Framework\TestCase;

class CommonTest extends TestCase
{

    /**
     * Recipient city ref.
     *
     * @var string
     */
    private $recipientCityRef = '8d5a980d-391c-11dd-90d9-001a92567626';

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
     * @var Common $model
     */
    private $model;


    /**
     * Method ID.
     */
    const METHOD_ID = 'Common';


    /**
     * Settings up.
     */
    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->model    = new Common($this->settings);
    }


    /**
     * @inheritdoc
     */
    public function testCommonClass()
    {
        $this->assertInstanceOf(
          ModelBase::class,
          $this->model
        );
    }


    /**
     * @inheritdoc
     */
    public function testCommonInterface()
    {
        $this->assertInstanceOf(
          CommonInterface::class,
          $this->model
        );
    }


    /**
     * @covers \NovaPoshta\Models\Common::getModelId
     */
    public function testCommonGetModelId()
    {
        $this->assertEquals(self::METHOD_ID, $this->model->getModelId());
    }


    /**
     * @covers \NovaPoshta\Models\Common::getCargoTypes
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetModelGetCargoTypes()
    {
        $response = $this->model->getCargoTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getBackwardDeliveryCargoTypes
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetBackwardDeliveryCargoTypes()
    {
        $response = $this->model->getBackwardDeliveryCargoTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getPalletsList
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetPalletsList()
    {
        $response = $this->model->getPalletsList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getTypesOfPayers
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetTypesOfPayers()
    {
        $response = $this->model->getTypesOfPayers();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getTypesOfPayersForRedelivery
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetTypesOfPayersForRedelivery()
    {
        $response = $this->model->getTypesOfPayersForRedelivery();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getPackList
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetPackList()
    {
        $response = $this->model->getPackList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getTiresWheelsList
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetTiresWheelsList()
    {
        $response = $this->model->getTiresWheelsList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getCargoDescriptionList
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetCargoDescriptionList()
    {
        $response = $this->model->getCargoDescriptionList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getMessageCodeText
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetMessageCodeText()
    {
        $response = $this->model->getMessageCodeText();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getServiceTypes
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetServiceTypes()
    {
        $response = $this->model->getServiceTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getTypesOfCounterparties
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetTypesOfCounterparties()
    {
        $response = $this->model->getTypesOfCounterparties();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getPaymentForms
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetPaymentForms()
    {
        $response = $this->model->getPaymentForms();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getOwnershipFormsList
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetOwnershipFormsList()
    {
        $response = $this->model->getOwnershipFormsList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    /**
     * @covers \NovaPoshta\Models\Common::getTimeIntervals
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testCommonGetTimeIntervals()
    {
        $response = $this->model->getTimeIntervals($this->recipientCityRef);

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }
}
