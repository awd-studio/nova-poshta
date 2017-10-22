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


    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->model    = new Common($this->settings);
    }


    public function testCommonClass()
    {
        $this->assertInstanceOf(
          ModelBase::class,
          $this->model
        );
    }


    public function testCommonInterface()
    {
        $this->assertInstanceOf(
          CommonInterface::class,
          $this->model
        );
    }


    public function testCommonGetModelId()
    {
        $this->assertEquals(self::METHOD_ID, $this->model->getModelId());
    }


    public function testCommonGetModelGetCargoTypes()
    {
        $response = $this->model->getCargoTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetBackwardDeliveryCargoTypes()
    {
        $response = $this->model->getBackwardDeliveryCargoTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetPalletsList()
    {
        $response = $this->model->getPalletsList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetTypesOfPayers()
    {
        $response = $this->model->getTypesOfPayers();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetTypesOfPayersForRedelivery()
    {
        $response = $this->model->getTypesOfPayersForRedelivery();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetPackList()
    {
        $response = $this->model->getPackList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetTiresWheelsList()
    {
        $response = $this->model->getTiresWheelsList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetCargoDescriptionList()
    {
        $response = $this->model->getCargoDescriptionList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetMessageCodeText()
    {
        $response = $this->model->getMessageCodeText();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetServiceTypes()
    {
        $response = $this->model->getServiceTypes();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetTypesOfCounterparties()
    {
        $response = $this->model->getTypesOfCounterparties();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetPaymentForms()
    {
        $response = $this->model->getPaymentForms();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


    public function testCommonGetOwnershipFormsList()
    {
        $response = $this->model->getOwnershipFormsList();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }


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
