<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests\Http;

use NovaPoshta\Http\GuzzleHttp;
use NovaPoshta\Http\Response;
use NovaPoshta\Models\TrackingDocument;
use NovaPoshta\Settings\Settings;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

/**
 * Class GuzzleHttpTest
 *
 * @package NovaPoshta\Tests\Http
 */
class GuzzleHttpTest extends TestCase
{

    /**
     * @var array
     */
    protected $data = [
      'param1' => 'value1',
      'param2' => [
        'param21' => 'param21',
        'param22' => 'param22',
        'param23' => 'param23',
      ],
    ];

    /**
     * Raw JSON response from API.
     *
     * @var string
     */
    protected $rawResponse;

    /**
     * Response instance.
     *
     * @var Response
     */
    protected $response;

    /**
     * Completed response.
     *
     * @var array
     */
    protected $responseData;

    /**
     * Settings instance.
     *
     * @var Settings $settings
     */
    private $settings;


    /**
     * Settings up.
     *
     * @covers \NovaPoshta\Http\Response::__construct
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function setUp()
    {
        parent::setUp();

        $this->settings     = Settings::getInstance()->auth('myAPIkey');
        $this->rawResponse  = json_encode($this->data);
        $this->response     = new Response($this->rawResponse);
        $this->responseData = $this->response->getResponse(true);
    }


    /**
     * @covers \NovaPoshta\Http\GuzzleHttp
     * @covers \NovaPoshta\Models\TrackingDocument::getSettings
     */
    public function testGuzzleHttpSend()
    {
        /**
         * @var \NovaPoshta\Http\HttpInterface|PHPUnit_Framework_MockObject_MockObject $http
         */
        $http = $this->getMockBuilder(GuzzleHttp::class)
                     ->getMock();

        $http->expects($this->any())
             ->method('send')
             ->will($this->returnValue($this->rawResponse));

        $this->assertInstanceOf(
          GuzzleHttp::class,
          $http
        );

        $this->assertEquals(
          json_encode($this->data),
          $http->send(new TrackingDocument($this->settings))
        );
    }
}
