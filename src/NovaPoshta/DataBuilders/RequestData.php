<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\DataBuilders;

use NovaPoshta\Exceptions\NpException;
use NovaPoshta\Util\Singleton;
use NovaPoshta\Models\Model;


/**
 * Class RequestData
 *
 * @package NovaPoshta\DataBuilders
 */
class RequestData implements DataBuildersInterface
{

    use Singleton;

    /**
     * API key.
     *
     * @var string
     */
    public $apiKey;

    /**
     * API model name.
     *
     * @var string
     */
    public $modelName;

    /**
     * API called method name.
     *
     * @var string
     */
    public $calledMethod;

    /**
     * Method properties data.
     *
     * @var object
     */
    public $methodProperties;


    /**
     * Build request data.
     *
     * @param \NovaPoshta\Models\Model $model Filled Model instance.
     * @param bool                     $json  If checked JSON-encoded string.
     *
     * @return DataBuildersInterface|string
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function build(Model $model, $json = true)
    {
        $settings = $model->getSettings();

        $this->apiKey           = $settings->getApiKey();
        $this->modelName        = $model->getModelName();
        $this->calledMethod     = $model->getCalledMethod();
        $this->methodProperties = (object) $model->getMethodProperties();

        foreach ($this as $property => $value) {
            if ($value === null) {
                throw new NpException("Property \"$property\" is not allowed!");
            }
        }

        if ($json) {
            return json_encode($this);
        }

        return $this;
    }
}
