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


use NovaPoshta\Util\Singleton;
use NovaPoshta\Exceptions\NpException;
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

    use Singleton;

    /**
     * API endpoint.
     */
    const NOVA_POSHTA_API_HOST = 'https://api.novaposhta.ua/v2.0/json/';

    const NOVA_POSHTA_LANGUAGE_UA = 'UA';

    const NOVA_POSHTA_LANGUAGE_RU = 'RU';

    /**
     * API key.
     *
     * @var string $apiKey
     */
    private $apiKey;

    /**
     * HTTP driver.
     *
     * @var HttpInterface $driver
     */
    private $driver;

    /**
     * @var bool $valid
     */
    private $valid = false;

    /**
     * @var string $language
     */
    private $language = self::NOVA_POSHTA_LANGUAGE_UA;


    /**
     * Check if settings is valid.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->valid = (!empty($this->apiKey) && $this->driver !== null);
    }


    /**
     * Get API key.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }


    /**
     * Set API key.
     *
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    /**
     * Get HTTP driver.
     *
     * @return HttpInterface
     */
    public function getDriver()
    {
        return $this->driver;
    }


    /**
     * Set HTTP driver.
     *
     * @param HttpInterface|null $driver
     *
     * @return $this
     */
    public function setDriver(HttpInterface $driver = null)
    {
        if ($driver === null) {
            $this->driver = $this->getDefaultDriver();
        } else {
            $this->driver = $driver;
        }

        return $this;
    }


    /**
     * Set language.
     *
     * @param string $language
     *
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function language($language = self::NOVA_POSHTA_LANGUAGE_UA)
    {
        if (
          $language === self::NOVA_POSHTA_LANGUAGE_UA ||
          $language === self::NOVA_POSHTA_LANGUAGE_RU
        ) {
            $this->language = $language;
        } else {
            $this->language = self::NOVA_POSHTA_LANGUAGE_UA;
        }
    }


    /**
     * Get current language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }


    /**
     * Get default HTTP driver.
     *
     * @return HttpInterface
     *
     * @throws \NovaPoshta\Exceptions\NpException
     */
    private function getDefaultDriver()
    {
        // @codeCoverageIgnoreStart
        if (class_exists('GuzzleHttp\\Client')) {
            $driver = new GuzzleHttp;
        } elseif (function_exists('curl_init')) {
            $driver = new CurlHttp;
        } else {
            throw new NpException('You need to install Guzzle library or php_curl om your server!');
        }

        // @codeCoverageIgnoreEnd

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
     * @return self
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function auth($key, HttpInterface $driver = null)
    {
        $this->setApiKey($key);

        if (isset($driver) || !$this->isValid()) {
            $this->setDriver($driver);
        }

        if ($this->isValid()) {
            return $this;
        }

        throw new NpException('Settings is not valid!');
    }
}
