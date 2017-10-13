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


/**
 * Trait for Settings.
 */
trait SettingsTrait
{

    /**
     * Settings instance.
     */
    private static $instance;

    /**
     * Avoid many instances of Settings.
     */
    private final function __construct() {}
    private final function __clone() {}
    private final function __wakeup() {}

    /**
     * Get SettingsTrait instance.
     *
     * @return self
     */
    public final static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}
