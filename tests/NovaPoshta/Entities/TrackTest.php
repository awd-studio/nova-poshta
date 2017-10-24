<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests\Entities;


use NovaPoshta\Entities\Track;
use PHPUnit\Framework\TestCase;

/**
 * Class TrackTest
 *
 * @package NovaPoshta\Tests\Entities
 */
final class TrackTest extends TestCase
{

    /**
     * @var string
     */
    private static $trackNumStatic = '01234567890123';

    /**
     * @var string
     */
    private static $phoneStatic = '380000001122';

    /**
     * @var Track
     */
    private $track;

    /**
     * @var Track with phone number.
     */
    private $trackWithPhone;


    /**
     * Data provider for test methods below
     */
    public static function trackProvider()
    {
        return [
          [self::$trackNumStatic],
          [[self::$trackNumStatic]],
          [['DocumentNumber' => self::$trackNumStatic]],
        ];
    }


    /**
     * Settings up.
     *
     * @covers \NovaPoshta\Entities\Track::__construct
     */
    protected function setUp()
    {
        parent::setUp();

        $this->track          = new Track(self::$trackNumStatic);
        $this->trackWithPhone = new Track(
          self::$trackNumStatic,
          self::$phoneStatic
        );
    }


    /**
     * @param string|array $currentTrack
     *
     * @dataProvider trackProvider
     *
     * @covers       \NovaPoshta\Entities\Track::__construct
     * @covers       \NovaPoshta\Entities\Track::getId
     */
    public function testTrack($currentTrack)
    {
        $track = new Track($currentTrack);

        $this->assertEquals($track->getId(), self::$trackNumStatic);
    }


    /**
     * @covers \NovaPoshta\Entities\Track::getPhone
     */
    public function testTrackGetPhone()
    {
        $track = $this->trackWithPhone;

        $this->assertEquals($track->getPhone(), self::$phoneStatic);
    }


    /**
     * @covers \NovaPoshta\Entities\Track::build
     */
    public function testTrackBuildHasTrack()
    {
        $track = $this->trackWithPhone;

        $this->assertArrayHasKey('DocumentNumber', $track->build());
    }


    /**
     * @covers \NovaPoshta\Entities\Track::build
     */
    public function testTrackBuildHasPhone()
    {
        $track = $this->trackWithPhone;

        $this->assertArrayHasKey('Phone', $track->build());
    }
}
