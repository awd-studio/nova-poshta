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


use NovaPoshta\Entities\TrackList;
use NovaPoshta\Http\Response;
use NovaPoshta\Models\ModelBase;
use NovaPoshta\Models\TrackingDocumentsInterface;
use NovaPoshta\Models\TrackingDocument;
use NovaPoshta\Settings\Settings;
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
     * ModelBase instance.
     *
     * @var TrackingDocument $model
     */
    private $model;


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
     * JSON.
     *
     * @var string
     */
    private $json;


    /**
     * @var Response
     */
    private $response;


    /**
     * @var TrackingDocument|\PHPUnit_Framework_MockObject_MockObject
     */
    private $mock;


    /**
     * Method ID.
     */
    const METHOD_ID = 'TrackingDocument';


    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->model    = new TrackingDocument($this->settings);
        $this->json     = json_encode([
          'success' => 'true',
          'data'    => [
            'param1' => 'val1',
            'param2' => 'val2',
          ],
        ]);
        $this->response = new Response($this->json);
        $this->mock     = $this->getMockBuilder(TrackingDocument::class)
                               ->setConstructorArgs([$this->settings])
                               ->setMethods(['getStatusDocuments'])
                               ->getMock();
    }


    public function testTrackingDocumentInstanceClass()
    {
        $this->assertInstanceOf(
          ModelBase::class,
          $this->model
        );
    }


    public function testTrackingDocumentInstanceInterface()
    {
        $this->assertInstanceOf(
          TrackingDocumentsInterface::class,
          $this->model
        );
    }


    public function testGetModelId()
    {
        $this->assertEquals(self::METHOD_ID, $this->model->getModelId());
    }


    public function testTrackingDocumentTrackNum()
    {
        $this->model->setTrackList($this->trackNum);

        $this->assertEquals($this->model->getTrackList(),
          $this->trackNum);
    }


    public function testTrackingDocumentGetStatusDocuments()
    {
        $trackList = new TrackList($this->trackNum);

        $this->mock->expects($this->atLeastOnce())
                   ->method('getStatusDocuments')
                   ->willReturn($this->response);

        $response = $this->mock->getStatusDocuments($trackList);

        $this->assertInstanceOf(Response::class, $response);

        $this->assertArrayHasKey('success', $response->getResponse(true));
    }
}
