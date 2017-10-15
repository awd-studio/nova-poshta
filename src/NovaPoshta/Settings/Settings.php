<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Settings;


use NovaPoshta\Http\CurlHttp;
use NovaPoshta\Http\GuzzleHttp;
use NovaPoshta\Http\HttpInterface;


/**
 * Class Settings
 *
 * @package NovaPoshta\Settings
 *
 * @method static Settings getInstance()
 */
class Settings
{

    use SettingsTrait;

    /**
     * API endpoint.
     */
    const NOVA_POSHTA_API_HOST = 'https://api.novaposhta.ua/v2.0/json/';

    /**
     * API key.
     *
     * @var string
     */
    private $apiKey;

    /**
     * HTTP driver.
     *
     * @var HttpInterface
     */
    private $driver;

    /**
     * @var bool
     */
    private $valid = false;

    /**
     * Testing mode.
     *
     * @var bool
     */
    private $testMode = false;

    /**
     * Check if settings is valid.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->valid = !empty($this->apiKey) && $this->driver !== null;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return HttpInterface
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param HttpInterface|null $driver
     */
    public function setDriver(HttpInterface $driver = null)
    {
        if ($driver === null) {
            $this->driver = $this->getDefaultDriver();
        } else {
            $this->driver = $driver;
        }
    }

    /**
     * @return bool
     */
    public function getTestMode()
    {
        return $this->testMode;
    }

    /**
     * @param bool $testMode
     */
    public function setTestMode($testMode = true)
    {
        $this->testMode = $testMode;
    }

    /**
     * Get default HTTP driver.
     */
    private function getDefaultDriver()
    {
        if (class_exists('GuzzleHttp\\Client')) {
            $driver = new GuzzleHttp;
        } elseif (function_exists('curl_init')) {
            $driver = new CurlHttp;
        } else {
            throw new \Exception('You need to install Guzzle library or php_curl om your server!');
        }

        return $driver;
    }

    /**
     * Get API Host.
     *
     * @return string
     */
    public static function getApiHost()
    {
        return mb_strtolower(self::NOVA_POSHTA_API_HOST);
    }

    /**
     * Authorize settings.
     *
     * @param string             $key
     * @param HttpInterface|null $driver
     *
     * @return $this
     * @throws \Exception
     */
    public function auth($key, HttpInterface $driver = null)
    {
        $this->setApiKey($key);
        $this->setDriver($driver);

        if ($this->isValid()) {
            return $this;
        }

        throw new \Exception('Settings is not valid!');
    }
}