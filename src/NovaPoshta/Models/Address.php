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

use NovaPoshta\DataBuilders\DataBuilderBase;
use NovaPoshta\Settings\Settings;


/**
 * Class Address
 *
 * @package NovaPoshta\Models
 *
 * @see     https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43
 */
class Address extends ModelBase implements AddressInterface
{


    /**
     * ModelBase name Id.
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
     *   CityName      string (optional) CityName      [max 36 char]
     *   CityRef       string (optional) CityRef       [max 36 char]
     *   Page          int    (optional) Page          [max 10 char]
     *   Limit         int    (optional) Limit         [max 10 char]
     *   Language      string (optional) Language      [max  2 char]
     *   SettlementRef string (optional) SettlementRef [max 36 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d8211a0fe4f08e8f7ce45
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getWarehouses(array $options = [])
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
    public static function getBranches(Settings $settings, array $options = [])
    {
        $model    = new self($settings);
        $response = $model->getWarehouses($options);

        return $response->getResponse();
    }
}
