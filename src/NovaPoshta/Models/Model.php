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


use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Http\Response;
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
    private $settings;

    /**
     * API model name.
     *
     * @var string
     */
    private $modelName;

    /**
     * API called method name.
     *
     * @var string
     */
    private $calledMethod;

    /**
     * Method properties data.
     *
     * @var array
     */
    private $methodProperties = [];


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
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function buildData()
    {
        $build = [
          'apiKey'           => $this->settings->getApiKey(),
          'modelName'        => $this->getModelName(),
          'calledMethod'     => $this->getCalledMethod(),
          'methodProperties' => $this->getMethodProperties(),
        ];

        foreach ($build as $key => $item) {
            if (empty($item) && $key != 'methodProperties') {
                throw new NpException("Data \"$key\" not allowed!");
            }
        }

        return json_encode($build);
    }


    /**
     * Execute Driver.
     *
     * @return \NovaPoshta\Http\Response
     *
     * @throws NpException
     */
    public function send()
    {
        try {
            return new Response($this->settings->getDriver()->send($this));
        } catch (NpException $exception) {
            $error = json_encode([
              'success' => false,
              'errors'  => [$exception->getMessage()],
            ]);

            return new Response($error);
        }
    }


    /**
     *
     *
     * @param string $model Current model name.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/
     */
    private function setModelName($model)
    {
        $this->modelName = $model;
    }


    /**
     * Get called method.
     *
     * @return string Name of model method.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/
     *
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function getCalledMethod()
    {
        if (!empty($this->calledMethod)) {
            return $this->calledMethod;
        } else {
            throw new NpException('Called method is not allowed!');
        }
    }


    /**
     * Set called method.
     *
     * @param string $calledMethod available method for current model.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/
     */
    public function setCalledMethod($calledMethod)
    {
        $this->calledMethod = $calledMethod;
    }


    /**
     * Get current model name.
     *
     * @return string
     */
    public function getModelName()
    {
        return $this->modelName;
    }


    /**
     * Get settings instance.
     *
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }


    /**
     * Get current method properties.
     *
     * @return array
     */
    public function getMethodProperties()
    {
        return $this->methodProperties;
    }


    /**
     * Set method properties.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/
     *
     * @param array $methodProperties
     */
    public function setMethodProperties($methodProperties)
    {
        $this->methodProperties = $methodProperties;
    }


    /**
     * Model name Id.
     *
     * @return string
     */
    abstract public function getModelId();
}
