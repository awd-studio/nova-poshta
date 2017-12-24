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

    /**
     * Driver.
     *
     * @var HttpInterface
     */
    private $driver;


    /**
     * Settings up.
     */
    public function setUp()
    {
        parent::setUp();

        $this->settings = Settings::getInstance()->auth($this->key);
        $this->driver = new CurlHttp();
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::getInstance
     */
    public function testSettingsSettingsInstance()
    {
        $this->assertInstanceOf(
            Settings::class,
            Settings::getInstance()
        );
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::isValid
     */
    public function testSettingsValidationKey()
    {
        $this->assertTrue($this->settings->isValid(), 'Validation filled key');
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::setApiKey
     * @covers \NovaPoshta\Settings\Settings::isValid
     */
    public function testSettingsValidationSetApiKey()
    {
        $this->settings->setApiKey('');
        $this->assertFalse($this->settings->isValid(), 'Validation empty key');
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::getApiKey
     */
    public function testSettingsKey()
    {
        $this->assertEquals($this->settings->getApiKey(), $this->key);
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::auth
     * @covers \NovaPoshta\Settings\Settings::getDriver
     */
    public function testSettingsDriver()
    {
        $settings = Settings::getInstance()->auth($this->key, $this->driver);

        $this->assertInstanceOf(
            HttpInterface::class,
            $settings->getDriver()
        );
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::auth
     * @covers \NovaPoshta\Settings\Settings::setDriver
     */
    public function testSettingsSetDriver()
    {
        $settings = Settings::getInstance()->auth($this->key);
        $settings->setDriver($this->driver);

        $this->assertInstanceOf(
            HttpInterface::class,
            $settings->getDriver()
        );
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::getDriver
     * @covers \NovaPoshta\Settings\Settings::getDefaultDriver
     */
    public function testSettingsDefaultDriver()
    {
        $this->assertInstanceOf(
            HttpInterface::class,
            $this->settings->getDriver()
        );
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::auth
     */
    public function testSettingsAuthException()
    {
        $this->expectException(NpException::class);

        $this->settings->auth('');
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::getApiHost
     */
    public function testSettingsApiHostIsUrl()
    {
        $apiHost = Settings::getApiHost();

        $this->assertRegExp(
            '/^https:\/\/?[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]*\/json\/$/',
            $apiHost
        );
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::language
     * @covers \NovaPoshta\Settings\Settings::getLanguage
     */
    public function testSettingsLanguageGet()
    {
        $this->settings->language(Settings::NOVA_POSHTA_LANGUAGE_RU);

        $this->assertEquals(
            Settings::NOVA_POSHTA_LANGUAGE_RU,
            $this->settings->getLanguage()
        );
    }


    /**
     * @covers \NovaPoshta\Settings\Settings::language
     */
    public function testSettingsLanguageSetDefault()
    {
        $this->settings->language('TEST');

        $this->assertEquals(
            Settings::NOVA_POSHTA_LANGUAGE_UA,
            $this->settings->getLanguage()
        );
    }
}
