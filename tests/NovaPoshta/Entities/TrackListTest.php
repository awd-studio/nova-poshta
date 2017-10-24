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

/**
 * Class TrackListTest
 *
 * @package NovaPoshta\Tests\Entities
 */
final class TrackListTest extends TestCase
{

    /**
     * @var string
     */
    private $trackNum = '01234567890120';

    /**
     * @var array
     */
    private $trackNums;

    /**
     * @var Track
     */
    private $trackObj;

    /**
     * @var TrackList
     */
    private $trackList;


    /**
     * Settings up.
     *
     * @covers \NovaPoshta\Entities\Track::__construct
     * @covers \NovaPoshta\Entities\TrackList::__construct
     */
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
        $this->trackList = new TrackList($this->trackNum);
    }


    /**
     * @covers \NovaPoshta\Entities\TrackList::__construct
     */
    public function testTrackListInstanceOfIterator()
    {
        $tl = new TrackList($this->trackNum);

        $this->assertInstanceOf(Iterator::class, $tl);
    }


    /**
     * @covers \NovaPoshta\Entities\TrackList::__construct
     */
    public function testTrackListInstanceOfCountable()
    {
        $tl = new TrackList($this->trackNum);

        $this->assertInstanceOf(Countable::class, $tl);
    }


    /**
     * @covers \NovaPoshta\Entities\TrackList::__construct
     */
    public function testTrackListInstanceException()
    {
        $this->expectException(NpException::class);

        new TrackList(new \stdClass);
    }


    /**
     * @covers \NovaPoshta\Entities\TrackList::__construct
     * @covers \NovaPoshta\Entities\TrackList::getTrack
     * @covers \NovaPoshta\Entities\Track::getId
     */
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


    /**
     * @covers \NovaPoshta\Entities\TrackList::__construct
     * @covers \NovaPoshta\Entities\TrackList::addTrack
     * @covers \NovaPoshta\Entities\TrackList::getTrack
     * @covers \NovaPoshta\Entities\Track::getId
     */
    public function testTrackListAddTrack()
    {
        $trackNumNew = '01234567890124';

        $tl = new TrackList($this->trackObj);
        $tl->addTrack($trackNumNew);

        $this->assertEquals($tl->getTrack($trackNumNew)->getId(), $trackNumNew);
    }


    /**
     * @covers \NovaPoshta\Entities\TrackList::addTrack
     * @covers \NovaPoshta\Entities\TrackList::count
     */
    public function testTrackListCount()
    {
        $this->trackList->addTrack('123');

        $this->assertEquals(2, count($this->trackList));
    }
}
