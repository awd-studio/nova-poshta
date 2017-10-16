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
    protected $settings;

    /**
     * API model name.
     *
     * @var string
     */
    protected $modelName;


    /**
     * API called method name.
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

        foreach ($build as $item) {
            if (empty($item)) {
                throw new NpException("Data \"$item\" not allowed!");
            }
        }

        return json_encode($build);
    }

    /**
     * Execute Driver.
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
