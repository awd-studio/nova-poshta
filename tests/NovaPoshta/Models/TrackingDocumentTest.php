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


use NovaPoshta\Models\Model;
use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\TrackingDocument;
use PHPUnit\Framework\TestCase;

final class TrackingDocumentTest extends TestCase
{

    public function testModelInstance()
    {
        $key      = 'myAPIkey';
        $settings = Settings::getInstance()->auth($key);

        $track = new TrackingDocument($settings);

        $this->assertInstanceOf(
          Model::class,
          $track
        );
    }

    public function testTrackingDocumentModel()
    {
        $key      = 'myAPIkey';
        $settings = Settings::getInstance()->auth($key);

        $track = new TrackingDocument($settings);

        $this->assertEquals($track->getModelName(), 'TrackingDocument');
    }

    public function testTrackingDocumentTrackNum()
    {
        $key      = 'myAPIkey';
        $settings = Settings::getInstance()->auth($key);

        $trackNum = '01234567890123';
        $track    = new TrackingDocument($settings);
        $track->setTrackList($trackNum);

        $this->assertEquals($track->getTrackList(), $trackNum);
    }

    //public function testTrackingDocumentBuild()
    //{
    //    $key      = 'myAPIkey';
    //    $settings = Settings::getInstance()->auth($key);
    //
    //    $trackNum = ['01234567890123', '01234567890124'];
    //    $track    = TrackingDocument::track($settings, $trackNum);
    //
    //    $this->assertEquals(1, 1);
    //}
}
