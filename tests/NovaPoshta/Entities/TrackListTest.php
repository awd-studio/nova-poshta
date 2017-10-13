<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests;


use NovaPoshta\Entities\Track;
use NovaPoshta\Entities\TrackList;
use PHPUnit\Framework\TestCase;

final class TrackListTest extends TestCase
{

    public function testTrackListIsIterator()
    {
        $trackNum = '01234567890123';
        $tl       = new TrackList($trackNum);

        $this->assertInstanceOf(
          \Iterator::class,
          $tl);
    }

    public function testTrackListForeach()
    {
        $trackNums = ['01234567890123', '01234567890124', '01234567890125'];
        $tl        = new TrackList($trackNums);

        foreach ($trackNums as $track) {
            $build = $tl->getTrack($track);

            $this->assertInstanceOf(
              Track::class,
              $build);

            $this->assertEquals($build->getId(), $track);
        }
    }

    public function testTrackListAddTrack()
    {
        $trackNum    = '01234567890123';
        $trackNumNew = '01234567890124';
        $tl          = new TrackList(new Track($trackNum));
        $tl->addTrack($trackNumNew);

        $this->assertEquals($tl->getTrack($trackNumNew)->getId(), $trackNumNew);
    }
}
