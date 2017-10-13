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

    public function testTrackAddString()
    {
        $trackNum = '01234567890123';
        $track    = new Track($trackNum);

        $this->assertEquals($track->getId(), $trackNum);
    }

    public function testTrackAddArray()
    {
        $trackNum = '01234567890123';
        $track    = new Track([$trackNum]);

        $this->assertEquals($track->getId(), $trackNum);
    }

    public function testTrackAddAssoc()
    {
        $trackNum = '01234567890123';
        $track    = new Track(['DocumentNumber' => $trackNum]);

        $this->assertEquals($track->getId(), $trackNum);
    }

    public function testTrackGetPhone()
    {
        $trackNum = '01234567890123';
        $phone    = '380000001122';
        $track    = new Track($trackNum, $phone);

        $this->assertEquals($track->getPhone(), $phone);
    }

    public function testTrackBuild()
    {
        $trackNum = '01234567890123';
        $phone    = '380000001122';
        $track    = new Track($trackNum, $phone);

        $this->assertEquals($track->build(), [
          'DocumentNumber' => $trackNum,
          'Phone'          => $phone,
        ]);
    }
}
