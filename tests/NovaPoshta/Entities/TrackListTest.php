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


use Countable;
use Iterator;
use NovaPoshta\Entities\Track;
use NovaPoshta\Entities\TrackList;
use NovaPoshta\Exceptions\NpException;
use PHPUnit\Framework\TestCase;

final class TrackListTest extends TestCase
{

    private $trackNum  = '01234567890120';

    private $trackNums;

    private $trackObj;

    /** @var TrackList */
    private $trackList;


    protected function setUp()
    {
        parent::setUp();

        $this->trackNum;
        $this->trackNums = [
          '01234567890121',
          '01234567890122',
          '01234567890123',
        ];
        $this->trackObj  = new Track($this->trackObj);
        $this->trackList  = new TrackList($this->trackNum);
    }


    public function testTrackListInstanceOfIterator()
    {
        $tl = new TrackList($this->trackNum);

        $this->assertInstanceOf(Iterator::class, $tl);
    }


    public function testTrackListInstanceOfCountable()
    {
        $tl = new TrackList($this->trackNum);

        $this->assertInstanceOf(Countable::class, $tl);
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


    public function testTrackListCount()
    {
        $this->trackList->addTrack('123');

        $this->assertEquals(2, count($this->trackList));
    }
}
