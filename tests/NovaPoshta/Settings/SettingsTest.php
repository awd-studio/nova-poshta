<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests\Settings;


use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Http\CurlHttp;
use NovaPoshta\Http\HttpInterface;
use NovaPoshta\Settings\Settings;
use PHPUnit\Framework\TestCase;

final class SettingsTest extends TestCase
{

    /**
     * Settings instance.
     *
     * @var Settings $settings
     */
    private $settings;

    /**
     * An API key.
     *
     * @var string
     */
    private $key = 'myAPIkey';


    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
    }


    public function testSettingsSettingsInstance()
    {
        $this->assertInstanceOf(
          Settings::class,
          Settings::getInstance()
        );
    }


    public function testSettingsValidationKey()
    {
        $this->assertTrue($this->settings->isValid(), 'Validation filled key');
    }


    public function testSettingsValidationSetApiKey()
    {
        $this->settings->setApiKey('');
        $this->assertFalse($this->settings->isValid(), 'Validation empty key');
    }


    public function testSettingsKey()
    {
        $this->assertEquals($this->settings->getApiKey(), $this->key);
    }


    public function testSettingsDriver()
    {
        $driver = new CurlHttp();

        $settings = Settings::getInstance()->auth($this->key, $driver);

        $this->assertInstanceOf(
          HttpInterface::class,
          $settings->getDriver()
        );
    }


    public function testSettingsDefaultDriver()
    {
        $this->assertInstanceOf(
          HttpInterface::class,
          $this->settings->getDriver()
        );
    }


    public function testSettingsAuthException()
    {
        $this->expectException(NpException::class);

        $this->settings->auth('');
    }


    public function testSettingsApiHostIsUrl()
    {
        $apiHost = Settings::getApiHost();

        $this->assertRegExp(
          '/^https:\/\/?[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]*\/json\/$/',
          $apiHost
        );
    }
}
