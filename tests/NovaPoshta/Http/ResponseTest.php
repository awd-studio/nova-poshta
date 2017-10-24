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


use NovaPoshta\Http\Response;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseTest
 *
 * @package NovaPoshta\Tests\Http
 */
final class ResponseTest extends TestCase
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
     * Settings up.
     *
     * @covers \NovaPoshta\Http\Response::__construct
     * @covers \NovaPoshta\Http\Response::getResponse
     */
    public function setUp()
    {
        parent::setUp();

        $this->rawResponse  = json_encode($this->data);
        $this->response     = new Response($this->rawResponse);
        $this->responseData = $this->response->getResponse(true);
    }


    /**
     * @covers \NovaPoshta\Http\Response::__construct
     * @covers \NovaPoshta\Http\Response::completeResponse
     */
    public function testResponseDataType()
    {
        $this->assertTrue(is_array($this->responseData));
    }


    /**
     * @covers \NovaPoshta\Http\Response::__construct
     * @covers \NovaPoshta\Http\Response::completeResponse
     */
    public function testResponseGetResponse()
    {
        $this->assertArrayHasKey('param1', $this->responseData);
        $this->assertArrayHasKey('param2', $this->responseData);
    }


    /**
     * @covers \NovaPoshta\Http\Response::__construct
     */
    public function testResponseGetRawResponseIsJson()
    {
        $this->assertJson($this->rawResponse);
    }


    /**
     * @covers \NovaPoshta\Http\Response::__construct
     */
    public function testResponseGetRawResponse()
    {
        $this->assertJsonStringEqualsJsonString(
          json_encode($this->data),
          $this->rawResponse
        );
    }


    /**
     * @covers \NovaPoshta\Http\Response::build
     */
    public function testResponseBuild()
    {
        $response = Response::build($this->rawResponse);

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
