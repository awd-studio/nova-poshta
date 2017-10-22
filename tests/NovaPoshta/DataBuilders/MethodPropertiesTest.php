<?php
/**
 * Created by PhpStorm.
 * User: awd
 * Date: 22.10.17
 * Time: 9:21
 */

namespace NovaPoshta\Tests\DataBuilders;

use NovaPoshta\DataBuilders\MethodProperties;
use PHPUnit\Framework\TestCase;

class MethodPropertiesTest extends TestCase
{


    /**
     * Testing data.
     *
     * @var array $data
     */
    private $data = [];

    /**
     * DataBuilder instance.
     *
     * @var MethodProperties $dataBuilder
     */
    private $dataBuilder;

    private $testVal = 'testValue';

    private $testProp = 'testProp';


    public function setUp()
    {
        parent::setUp();

        $this->dataBuilder = new MethodProperties(['testStartProp' => 'testStartVal']);
        $this->dataBuilder->set($this->testProp, $this->testVal);
    }


    public function testMethodPropertiesClass()
    {
        $this->assertInstanceOf(
          MethodProperties::class,
          $this->dataBuilder
        );
    }


    public function testMethodPropertiesJsonSerialize()
    {
        $this->assertInstanceOf(
          \stdClass::class,
          $this->dataBuilder->jsonSerialize()
        );
    }


    public function testMethodPropertiesJson()
    {
        $json = json_encode($this->dataBuilder);

        $this->assertJson($json);
        $this->assertRegExp(
          '/{"testStartProp":"testStartVal","testProp":"testValue"}/',
          $json
        );
    }
}
