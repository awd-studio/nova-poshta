<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests\Models;


use NovaPoshta\Models\Model;
use NovaPoshta\Models\TrackingDocumentsInterface;
use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\TrackingDocument;
use PHPUnit\Framework\TestCase;

final class TrackingDocumentTest extends TestCase
{

    /**
     * Settings instance.
     *
     * @var Settings $settings
     */
    private $settings;


    /**
     * Model instance.
     *
     * @var TrackingDocument $trackingDocument
     */
    private $trackingDocument;


    /**
     * An API key.
     *
     * @var string
     */
    private $key = 'myAPIkey';


    /**
     * Tracking number.
     *
     * @var string
     */
    private $trackNum = '01234567890123';


    /**
     * Method ID.
     */
    const METHOD_ID = 'TrackingDocument';


    public function setUp()
    {
        parent::setUp();

        $this->settings         = Settings::getInstance()->auth($this->key);
        $this->trackingDocument = new TrackingDocument($this->settings);
    }


    public function testTrackingDocumentInstance()
    {
        $this->assertInstanceOf(
          Model::class,
          $this->trackingDocument
        );

        $this->assertInstanceOf(
          TrackingDocumentsInterface::class,
          $this->trackingDocument
        );
    }


    public function testTrackingDocumentModel()
    {
        $this->assertEquals($this->trackingDocument->getModelName(), self::METHOD_ID);
    }


    public function testTrackingDocumentTrackNum()
    {
        $this->trackingDocument->setTrackList($this->trackNum);

        $this->assertEquals($this->trackingDocument->getTrackList(), $this->trackNum);
    }


    public function testTrackingDocumentTrack()
    {
        $track = TrackingDocument::track($this->settings, $this->trackNum);

        $this->assertInstanceOf(\stdClass::class, $track);
    }
}
