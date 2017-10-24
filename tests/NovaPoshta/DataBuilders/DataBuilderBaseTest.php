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

/**
 * Class DataBuilderBaseTest
 *
 * @package NovaPoshta\Tests\DataBuilders
 */
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
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::__construct
     */
    public function setUp()
    {
        parent::setUp();

        $this->dataBuilder = new DataBuilderBase($this->data);
    }


    /**
     * @inheritdoc
     */
    public function testDataBuilderBaseClass()
    {
        $this->assertInstanceOf(
          DataBuilderBase::class,
          $this->dataBuilder
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::set
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::get
     */
    public function testDataBuilderBaseInterfaceDataInterface()
    {
        $this->assertInstanceOf(
          DataInterface::class,
          $this->dataBuilder
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::current
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::next
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::key
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::valid
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::rewind
     */
    public function testDataBuilderBaseInterfaceIterator()
    {
        $this->assertInstanceOf(
          Iterator::class,
          $this->dataBuilder
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::count
     */
    public function testDataBuilderBaseInterfaceCountable()
    {
        $this->assertInstanceOf(
          Countable::class,
          $this->dataBuilder
        );
    }


    /**
     * @covers \NovaPoshta\Exceptions\NpException::__construct
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::set
     */
    public function testDataBuilderBaseSetException()
    {
        $this->expectException(NpException::class);

        $this->dataBuilder->set(new \stdClass());
    }


    /**
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::set
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::get
     */
    public function testDataBuilderBaseSetGet()
    {
        $this->dataBuilder->set($this->testProp, $this->testVal);

        $this->assertEquals(
          $this->testVal,
          $this->dataBuilder->get($this->testProp)
        );
    }


    /**
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::set
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::count
     */
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


    /**
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::set
     * @covers \NovaPoshta\DataBuilders\DataBuilderBase::count
     */
    public function testDataBuilderBaseCount()
    {
        $this->dataBuilder->set($this->testProp, $this->testVal);

        $this->assertEquals(1, count($this->dataBuilder));
    }
}
