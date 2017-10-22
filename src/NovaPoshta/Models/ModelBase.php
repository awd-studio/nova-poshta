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


use NovaPoshta\DataBuilders\MethodProperties;
use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Http\Response;
use NovaPoshta\Settings\Settings;


/**
 * Abstract class ModelBase
 *
 * @package NovaPoshta\Models
 */
abstract class ModelBase
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
     * @var \NovaPoshta\DataBuilders\DataInterface
     */
    private $methodProperties;


    /**
     * ModelBase constructor.
     *
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings         = $settings;
        $this->methodProperties = new MethodProperties([
          'Language' => $settings->getLanguage(),
        ]);

        $this->setModelName($this->getModelId());

        return $this;
    }


    /**
     * Execute Driver.
     *
     * @return \NovaPoshta\Http\Response
     *
     * @throws \NovaPoshta\Exceptions\NpException
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
     * @link https://devcenter.novaposhta.ua/docs/services/
     * @return $this
     */
    private function setModelName($model)
    {
        $this->modelName = $model;

        return $this;
    }


    /**
     * Get called method.
     *
     * @return string Name of model method.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/
     */
    public function getCalledMethod()
    {
        return $this->calledMethod;
    }


    /**
     * Set called method.
     *
     * @param string $calledMethod available method for current model.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/
     * @return $this
     */
    public function setCalledMethod($calledMethod)
    {
        $this->calledMethod = $calledMethod;

        return $this;
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
     * @return \NovaPoshta\DataBuilders\DataInterface
     */
    public function getMethodProperties()
    {
        return $this->methodProperties;
    }


    /**
     * Set method properties.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/
     *
     * @param array $methodProperties
     *
     * @return $this
     */
    public function setMethodProperties(array $methodProperties)
    {
        $this->methodProperties->set($methodProperties);

        return $this;
    }


    /**
     * Set method property.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/
     *
     * @param string $property
     * @param string $value
     *
     * @return \NovaPoshta\Models\ModelBase
     */
    public function setMethodProperty($property, $value)
    {
        $this->methodProperties->set($property, $value);

        return $this;
    }


    /**
     * Check required method properties.
     *
     * @param array $properties
     *
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function getRequiredProperties(array $properties)
    {
        foreach ($properties as $name => $value) {
            if ($this->methodProperties->get($value) === null) {
                throw new NpException("Property \"$value\" is required!");
            }
        }
    }


    /**
     * ModelBase name Id.
     *
     * @return string
     */
    abstract public function getModelId();
}
