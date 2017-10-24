<?php
/**
 * Created by PhpStorm.
 * User: awd
 * Date: 20.10.17
 * Time: 10:25
 */

namespace NovaPoshta\Tests\Models;

use NovaPoshta\Http\Response;
use NovaPoshta\Models\ModelBase;
use NovaPoshta\Models\Payment;
use NovaPoshta\Models\PaymentInterface;
use NovaPoshta\Settings\Settings;

/**
 * Class PaymentTest
 *
 * @package NovaPoshta\Tests\Models
 */
class PaymentTest extends \PHPUnit_Framework_TestCase
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
     * @var Payment $model
     */
    private $model;


    /**
     * Method ID.
     */
    const METHOD_ID = 'Payment';


    /**
     * Settings up.
     */
    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->model    = new Payment($this->settings);
    }


    /**
     * @inheritdoc
     */
    public function testPaymentClass()
    {
        $this->assertInstanceOf(
          ModelBase::class,
          $this->model
        );
    }


    /**
     * @inheritdoc
     */
    public function testPaymentInterface()
    {
        $this->assertInstanceOf(
          PaymentInterface::class,
          $this->model
        );
    }


    /**
     * @covers \NovaPoshta\Models\Payment::getModelId
     */
    public function testPaymentGetModelId()
    {
        $this->assertEquals(self::METHOD_ID, $this->model->getModelId());
    }


    /**
     * @covers \NovaPoshta\Models\Payment::getCards
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function testPaymentGetModelGetCargoTypes()
    {
        $response = $this->model->getCards();

        $this->assertInstanceOf(
          Response::class,
          $response
        );

        $this->assertArrayHasKey('data', $response->getResponse(true));
    }
}
