<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests;


use NovaPoshta\Http\HttpInterface;
use NovaPoshta\Settings\Settings;
use PHPUnit\Framework\TestCase;

final class SettingsTest extends TestCase
{

    public function testSettingsInstance()
    {
        $this->assertInstanceOf(
          Settings::class,
          Settings::getInstance()
        );
    }

    public function testValidationKey()
    {
        $key      = 'myAPIkey';
        $settings = Settings::getInstance()->auth($key);

        $this->assertTrue($settings->isValid(), 'Validation filled key');

        $settings->setApiKey('');
        $this->assertFalse($settings->isValid(), 'Validation empty key');
    }

    public function testKey()
    {
        $key      = 'myAPIkey';
        $settings = Settings::getInstance()->auth($key);

        $this->assertEquals($settings->getApiKey(), $key);
    }

    public function testDriver()
    {
        $key      = 'myAPIkey';
        $settings = Settings::getInstance()->auth($key);

        $this->assertInstanceOf(
          HttpInterface::class,
          $settings->getDriver()
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
