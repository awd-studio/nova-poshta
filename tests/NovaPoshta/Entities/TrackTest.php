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
use PHPUnit\Framework\TestCase;

final class TrackTest extends TestCase
{

    private $trackNum = '01234567890123';

    private $phone = '380000001122';

    public function testTrackAddString()
    {
        $track = new Track($this->trackNum);

        $this->assertEquals($track->getId(), $this->trackNum);
    }

    public function testTrackAddArray()
    {
        $track = new Track([$this->trackNum]);

        $this->assertEquals($track->getId(), $this->trackNum);
    }

    public function testTrackAddAssoc()
    {
        $track = new Track(['DocumentNumber' => $this->trackNum]);

        $this->assertEquals($track->getId(), $this->trackNum);
    }

    public function testTrackGetPhone()
    {
        $track = new Track($this->trackNum, $this->phone);

        $this->assertEquals($track->getPhone(), $this->phone);
    }

    public function testTrackBuild()
    {
        $track    = new Track($this->trackNum, $this->phone);

        $this->assertEquals($track->build(), [
          'DocumentNumber' => $this->trackNum,
          'Phone'          => $this->phone,
        ]);
    }
}
