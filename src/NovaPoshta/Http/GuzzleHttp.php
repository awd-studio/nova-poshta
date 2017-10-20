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


use NovaPoshta\DataBuilders\RequestData;
use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Models\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


/**
 * Class GuzzleHttp
 *
 * @package NovaPoshta\Settings
 */
class GuzzleHttp implements HttpInterface
{

    /**
     * Execute request.
     *
     * @param Model $model
     *
     * @return string
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function send(Model $model)
    {
        $response = null;

        $settings = $model->getSettings();
        $uri      = $settings::getApiHost();

        $body = RequestData::getInstance()->build($model, false);

        try {
            $client = new Client();

            $response = $client->post($uri, [
              'json' => $body,
            ]);

            return (string) $response->getBody();
        } catch (RequestException $e) {
            throw new NpException("GuzzleHttp request failed! Exception: {$e->getMessage()}");
        }
    }
}
