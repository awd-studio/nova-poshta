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
use NovaPoshta\Entities\TrackList;
use NovaPoshta\Exceptions\NpException;
use PHPUnit\Framework\TestCase;

final class TrackListTest extends TestCase
{

    private $trackNum;

    private $trackNums;

    private $trackObj;


    protected function setUp()
    {
        parent::setUp();

        $this->trackNum  = '01234567890123';
        $this->trackNums = [
          '01234567890123',
          '01234567890124',
          '01234567890125',
        ];
        $this->trackObj  = new Track($this->trackNum);
    }


    public function testTrackListIsIterator()
    {
        $tl = new TrackList($this->trackNum);

        $this->assertInstanceOf(\Iterator::class, $tl);
    }


    public function testTrackListInstanceException()
    {
        $this->expectException(NpException::class);

        new TrackList(new \stdClass);
    }


    public function testTrackListForeach()
    {
        $tl = new TrackList($this->trackNums);

        foreach ($this->trackNums as $track) {
            $build = $tl->getTrack($track);

            $this->assertInstanceOf(
              Track::class,
              $build);

            $this->assertEquals($build->getId(), $track);
        }
    }


    public function testTrackListAddTrack()
    {
        $trackNumNew = '01234567890124';

        $tl = new TrackList($this->trackObj);
        $tl->addTrack($trackNumNew);

        $this->assertEquals($tl->getTrack($trackNumNew)->getId(), $trackNumNew);
    }
}
