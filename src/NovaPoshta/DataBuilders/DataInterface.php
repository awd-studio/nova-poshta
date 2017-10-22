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


/**
 * Interface for DataBuilders.
 *
 * @package NovaPoshta\DataBuilders
 */
interface DataInterface
{

    /**
     * Set data property.
     *
     * @param array|string $property Properties array or property name.
     * @param mixed        $value    Property value.
     *
     * @return \NovaPoshta\DataBuilders\DataInterface
     */
    public function set($property, $value = null);


    /**
     * Get data property.
     *
     * @param string $property Property name. If empty - will return all data.
     *
     * @return mixed
     */
    public function get($property = null);
}
