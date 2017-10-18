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

final class TrackTest extends TestCase
{

    private static $trackNumStatic = '01234567890123';

    private static $phoneStatic = '380000001122';

    /** @var Track */
    private $track;

    /** @var Track */
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
     * @dataProvider trackProvider
     *
     * @param string|array $currentTrack
     */
    public function testTrack($currentTrack)
    {
        $track = new Track($currentTrack);

        $this->assertEquals($track->getId(), self::$trackNumStatic);
    }


    public function testTrackGetPhone()
    {
        $track = $this->trackWithPhone;

        $this->assertEquals($track->getPhone(), self::$phoneStatic);
    }


    public function testTrackBuildHasTrack()
    {
        $track = $this->trackWithPhone;

        $this->assertArrayHasKey('DocumentNumber', $track->build());
    }


    public function testTrackBuildHasPhone()
    {
        $track = $this->trackWithPhone;

        $this->assertArrayHasKey('Phone', $track->build());
    }
}
