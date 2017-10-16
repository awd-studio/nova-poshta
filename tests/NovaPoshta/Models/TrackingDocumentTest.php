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
     * TrackingDocument instance.
     *
     * @var TrackingDocument $settings
     */
    private $track;

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

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->track = new TrackingDocument($this->settings);
    }

    public function testModelInstance()
    {
        $this->assertInstanceOf(
          Model::class,
          $this->track
        );
    }

    public function testTrackingDocumentModel()
    {
        $this->assertEquals($this->track->getModelName(), self::METHOD_ID);
    }

    public function testTrackingDocumentTrackNum()
    {
        $this->track->setTrackList($this->trackNum);

        $this->assertEquals($this->track->getTrackList(), $this->trackNum);
    }
}
