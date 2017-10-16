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

    public function testSettingsInstance()
    {
        $this->assertInstanceOf(
          Settings::class,
          Settings::getInstance()
        );
    }

    public function testValidationKey()
    {
        $this->assertTrue($this->settings->isValid(), 'Validation filled key');

        $this->settings->setApiKey('');
        $this->assertFalse($this->settings->isValid(), 'Validation empty key');
    }

    public function testKey()
    {
        $this->assertEquals($this->settings->getApiKey(), $this->key);
    }

    public function testDriver()
    {
        $this->assertInstanceOf(
          HttpInterface::class,
          $this->settings->getDriver()
        );
    }

    public function testApiHostIsUrl()
    {
        $apiHost = Settings::getApiHost();
        $this->assertRegExp(
          '/^https:\/\/?[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]*\/json\/$/',
          $apiHost
        );
    }
}
