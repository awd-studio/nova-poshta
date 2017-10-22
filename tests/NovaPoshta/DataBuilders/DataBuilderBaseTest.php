<?php
/**
 * Created by PhpStorm.
 * User: awd
 * Date: 22.10.17
 * Time: 8:20
 */

namespace NovaPoshta\Tests\DataBuilders;

use Countable;
use Iterator;
use NovaPoshta\DataBuilders\DataBuilderBase;
use NovaPoshta\DataBuilders\DataInterface;
use NovaPoshta\Exceptions\NpException;
use PHPUnit\Framework\TestCase;

class DataBuilderBaseTest extends TestCase
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
     * @var DataBuilderBase $dataBuilder
     */
    private $dataBuilder;

    private $testVal = 'testValue';

    private $testProp = 'testProp';


    public function setUp()
    {
        parent::setUp();

        $this->dataBuilder = new DataBuilderBase($this->data);
    }


    public function testDataBuilderBaseClass()
    {
        $this->assertInstanceOf(
          DataBuilderBase::class,
          $this->dataBuilder
        );
    }


    public function testDataBuilderBaseInterfaceDataInterface()
    {
        $this->assertInstanceOf(
          DataInterface::class,
          $this->dataBuilder
        );
    }


    public function testDataBuilderBaseInterfaceIterator()
    {
        $this->assertInstanceOf(
          Iterator::class,
          $this->dataBuilder
        );
    }


    public function testDataBuilderBaseInterfaceCountable()
    {
        $this->assertInstanceOf(
          Countable::class,
          $this->dataBuilder
        );
    }


    public function testDataBuilderBaseSetException()
    {
        $this->expectException(NpException::class);

        $this->dataBuilder->set(new \stdClass());
    }


    public function testDataBuilderBaseSetGet()
    {
        $this->dataBuilder->set($this->testProp, $this->testVal);

        $this->assertEquals(
          $this->testVal,
          $this->dataBuilder->get($this->testProp)
        );
    }


    public function testDataBuilderBaseForeach()
    {
        $count    = 5;
        $iterator = 0;

        for ($i = $iterator; $i < $count; $i++) {
            $this->dataBuilder->set($this->testProp . $i, $this->testVal . $i);
        }

        $this->assertEquals(5, count($this->dataBuilder));

        foreach ($this->dataBuilder as $k => $item) {
            $this->assertEquals($k, $this->testProp . $iterator);
            $this->assertEquals($item, $this->testVal . $iterator);

            $iterator++;
        }
    }


    public function testDataBuilderBaseCount()
    {
        $this->dataBuilder->set($this->testProp, $this->testVal);

        $this->assertEquals(1, count($this->dataBuilder));
    }
}
