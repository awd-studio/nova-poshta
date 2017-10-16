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
 * Class Address
 *
 * @package NovaPoshta\Models
 */
class Address extends Model implements AddressInterface
{


    /**
     * Model name Id.
     *
     * @return string
     */
    public function getModelId()
    {
        return 'Address';
    }


    /**
     * Get Nova Poshta warehouses.
     *
     * @param array $options
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getWarehouses($options = [])
    {
        $this->setCalledMethod('getWarehouses');
        $this->setMethodProperties($options);

        return $this->send();
    }


    /**
     * Get addresses static.
     *
     * @param Settings $settings
     * @param array    $options
     *
     * @return array|string
     */
    public static function getBranches(Settings $settings, $options = [])
    {
        $model    = new self($settings);
        $response = $model->getWarehouses($options);

        return $response->getResponse();
    }
}
