<?php
/**
 * Created by PhpStorm.
 * User: awd
 * Date: 20.10.17
 * Time: 5:20
 */

namespace NovaPoshta\Tests\DataBuilders;

use NovaPoshta\DataBuilders\RequestData;
use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Models\TrackingDocument;
use NovaPoshta\Settings\Settings;

class RequestDataTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Settings instance.
     *
     * @var Settings $settings
     */
    private $settings;


    /**
     * Model instance.
     *
     * @var TrackingDocument $model
     */
    private $model;


    /**
     * RequestData instance.
     *
     * @var RequestData $requestData
     */
    private $requestData;


    /**
     * Model instance.
     *
     * @var object|string $data
     */
    private $data;


    /**
     * An API key.
     *
     * @var string
     */
    private $key = 'myAPIkey';


    public function setUp()
    {
        parent::setUp();

        $this->settings    = Settings::getInstance()->auth($this->key);
        $this->model       = (new TrackingDocument($this->settings))->setCalledMethod('testCalledMethod');
        $this->requestData = RequestData::getInstance();
        $this->data        = $this->requestData->build($this->model);
    }


    public function testRequestDataInstanceClass()
    {
        $this->assertInstanceOf(
          RequestData::class,
          $this->requestData
        );
    }


    public function testRequestDataBuildObject()
    {
        $object = RequestData::getInstance()->build($this->model, false);

        $this->assertObjectHasAttribute('apiKey', $object);
        $this->assertObjectHasAttribute('modelName', $object);
        $this->assertObjectHasAttribute('calledMethod', $object);
        $this->assertObjectHasAttribute('methodProperties', $object);
    }


    public function testRequestDataBuildJson()
    {
        $this->assertJson($this->data);
    }


    public function testRequestDataBuildException()
    {
        $this->expectException(NpException::class);

        $td = new TrackingDocument($this->settings);

        RequestData::getInstance()->build($td);

    }
}
