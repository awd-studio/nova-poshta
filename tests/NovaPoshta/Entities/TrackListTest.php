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
use PHPUnit\Framework\TestCase;

final class TrackListTest extends TestCase
{

    private $trackNum = '01234567890123';

    private $trackNums = ['01234567890123', '01234567890124', '01234567890125'];


    public function testTrackListIsIterator()
    {
        $tl = new TrackList($this->trackNum);

        $this->assertInstanceOf(
          \Iterator::class,
          $tl);
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

        $tl = new TrackList(new Track($this->trackNum));
        $tl->addTrack($trackNumNew);

        $this->assertEquals($tl->getTrack($trackNumNew)->getId(), $trackNumNew);
    }
}
