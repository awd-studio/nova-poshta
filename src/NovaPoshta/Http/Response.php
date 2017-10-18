<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Http;

use NovaPoshta\Exceptions\NpException;


/**
 * Class Response.
 *
 * Worked with JSON responses gated from API.
 *
 * @package NovaPoshta\Http
 */
class Response
{

    /**
     * Raw JSON response from API.
     *
     * @var string
     */
    protected $rawResponse;

    /**
     * Completed response.
     *
     * @var array
     */
    protected $response;


    /**
     * Response constructor.
     *
     * @param string $response Raw JSON from API.
     *
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function __construct($response)
    {
        $this->rawResponse = $response;

        if (!empty($response) && $data = $this->completeResponse()) {
            $this->response = $data;
        } else {
            throw new NpException('Empty response!');
        }
    }


    /**
     * Decode JSON response.
     *
     * @return mixed
     * @throws \NovaPoshta\Exceptions\NpException
     */
    protected function completeResponse()
    {
        if (($json = json_decode($this->rawResponse)) !== null) {
            return $json;
        } else {
            throw new NpException('Incorrect response!');
        }
    }


    /**
     * Get completed response.
     *
     * @param bool $array
     *
     * @return array|string
     */
    public function getResponse($array = false)
    {
        if ($array) {
            return (array) $this->response;
        }

        return $this->response;
    }


    /**
     * Get raw response.
     *
     * @return string
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }


    /**
     * Build response static.
     *
     * @param string $json Raw JSON from API.
     *
     * @return array
     */
    public static function build($json)
    {
        $response = new self($json);

        return $response->getResponse();
    }
}
