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

/**
 * Class MethodPropertiesTest
 *
 * @package NovaPoshta\Tests\DataBuilders
 */
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

    /**
     * @var string
     */
    private $testVal = 'testValue';

    /**
     * @var string
     */
    private $testProp = 'testProp';


    /**
     * Settings up.
     *
     * @covers \NovaPoshta\DataBuilders\MethodProperties::__construct
     */
    public function setUp()
    {
        parent::setUp();

        $this->dataBuilder = new MethodProperties(['testStartProp' => 'testStartVal']);
        $this->dataBuilder->set($this->testProp, $this->testVal);
    }


    /**
     * @covers \NovaPoshta\DataBuilders\MethodProperties::__construct
     */
    public function testMethodPropertiesClass()
    {
        $this->assertInstanceOf(
          MethodProperties::class,
          $this->dataBuilder
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\MethodProperties::jsonSerialize
     */
    public function testMethodPropertiesJsonSerialize()
    {
        $this->assertInstanceOf(
          \stdClass::class,
          $this->dataBuilder->jsonSerialize()
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\MethodProperties::jsonSerialize
     */
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
