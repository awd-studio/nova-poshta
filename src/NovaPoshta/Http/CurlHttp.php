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
use NovaPoshta\Models\Model;


/**
 * Class CurlHttp
 *
 * @package NovaPoshta\Settings
 */
class CurlHttp implements HttpInterface
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
        static $chanel = 0; // keepalive

        $response = null;
        $settings = $model->getSettings();
        $post     = $model->buildData();
        $uri      = $settings::getApiHost();

        if (!$chanel) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL            => $uri,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST  => "POST",
              CURLOPT_POSTFIELDS     => $post,
              CURLOPT_HTTPHEADER     => array("content-type: application/json",),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                throw new NpException("cURL Error #:" . $err);
            }
        }

        return $response;
    }
}
