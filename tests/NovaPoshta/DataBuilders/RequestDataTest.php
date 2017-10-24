<?php
/**
 * Created by PhpStorm.
 * User: awd
 * Date: 20.10.17
 * Time: 5:20
 */

namespace NovaPoshta\Tests\DataBuilders;

use NovaPoshta\DataBuilders\RequestData;
use NovaPoshta\DataBuilders\RequestDataInterface;
use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Models\TrackingDocument;
use NovaPoshta\Settings\Settings;

/**
 * Class RequestDataTest
 *
 * @package NovaPoshta\Tests\DataBuilders
 */
class RequestDataTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Settings instance.
     *
     * @var Settings $settings
     */
    private $settings;


    /**
     * ModelBase instance.
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
     * ModelBase instance.
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


    /**
     * Settings up.
     *
     * @covers \NovaPoshta\Settings\Settings::getInstance
     * @covers \NovaPoshta\Settings\Settings::auth
     * @covers \NovaPoshta\Models\TrackingDocument::__construct
     * @covers \NovaPoshta\DataBuilders\RequestData::__construct
     * @covers \NovaPoshta\DataBuilders\RequestData::build
     */
    public function setUp()
    {
        parent::setUp();

        $this->settings    = Settings::getInstance()->auth($this->key);
        $this->model       = (new TrackingDocument($this->settings))->setCalledMethod('testCalledMethod');
        $this->requestData = RequestData::getInstance();
        $this->data        = $this->requestData->build($this->model);
    }


    /**
     * @inheritdoc
     */
    public function testRequestDataInstanceClass()
    {
        $this->assertInstanceOf(
          RequestDataInterface::class,
          $this->requestData
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\RequestData::__construct
     * @covers \NovaPoshta\DataBuilders\RequestData::build
     */
    public function testRequestDataBuildObject()
    {
        $object = RequestData::getInstance()->build($this->model, false);

        $this->assertObjectHasAttribute('apiKey', $object);
        $this->assertObjectHasAttribute('modelName', $object);
        $this->assertObjectHasAttribute('calledMethod', $object);
        $this->assertObjectHasAttribute('methodProperties', $object);
    }


    /**
     * @covers \NovaPoshta\DataBuilders\RequestData::build
     */
    public function testRequestDataBuildJson()
    {
        $this->assertJson($this->data);
    }


    /**
     * @covers \NovaPoshta\DataBuilders\RequestData::getInstance
     * @covers \NovaPoshta\DataBuilders\RequestData::build
     * @covers \NovaPoshta\Exceptions\NpException::__construct
     * @covers \NovaPoshta\Models\TrackingDocument::__construct
     */
    public function testRequestDataBuildException()
    {
        $this->expectException(NpException::class);

        $td = new TrackingDocument($this->settings);

        RequestData::getInstance()->build($td);

    }
}
