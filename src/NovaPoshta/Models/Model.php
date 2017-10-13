<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Models;


use NovaPoshta\Settings\Settings;


/**
 * Abstract class Model
 *
 * @package NovaPoshta\Models
 */
abstract class Model
{

    /**
     * Settings.
     *
     * @var Settings
     */
    protected $settings;

    /**
     * API model name.
     *
     * @var string
     */
    protected $modelName;

    /**
     * Called Method.
     *
     * @var string
     */
    protected $calledMethod;

    /**
     * Model constructor.
     *
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;

        $this->setModelName($this->getModelId());

        return $this;
    }

    /**
     * Build request data.
     *
     * @return string
     * @throws \Exception
     */
    public function buildData()
    {
        $build = [
          'apiKey'           => $this->settings->getApiKey(),
          'modelName'        => $this->getModelName(),
          'calledMethod'     => $this->getCalledMethod(),
          'methodProperties' => $this->getMethodProperties(),
        ];

        foreach ($build as $item) {
            if (empty($item)) {
                throw new \Exception("Data \"$item\" not allowed!");
            }
        }

        return json_encode($build);
    }

    /**
     * Execute Driver.
     */
    public function send()
    {
        return $this->settings->getDriver()->send($this);
    }

    /**
     * @param string $model
     */
    private function setModelName($model)
    {
        $this->modelName = $model;
    }

    /**
     * @param string $calledMethod
     */
    public function setCalledMethod($calledMethod)
    {
        $this->calledMethod = $calledMethod;
    }

    /**
     * Get called method.
     *
     * @return string
     * @throws \Exception
     */
    public function getCalledMethod()
    {
        if (!empty($this->calledMethod)) {
            return $this->calledMethod;
        } else {
            throw new \Exception('Called method is not allowed!');
        }
    }

    /**
     * @return string
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Model name Id.
     *
     * @return string
     */
    abstract public function getModelId();

    /**
     * Build data for methodProperties item.
     *
     * @return array
     */
    abstract public function getMethodProperties();
}
