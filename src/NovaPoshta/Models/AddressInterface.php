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


use NovaPoshta\Http\Response;

/**
 * Interface AddressInterface
 *
 * @package NovaPoshta\Models
 */
interface AddressInterface
{

    /**
     * Create counterpart.
     *
     * ToDo: Implement the method
     *
     * ToDo: Check method correct name ("save" or "Save")
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save();


    /**
     * Update counterpart address.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function update();


    /**
     * Dalete counterpart address.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();


    /**
     * Get cities.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getCities();


    /**
     * Get Nova Poshta settlements.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getSettlements();


    /**
     * Get geographic areas.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getAreas();


    /**
     * Get Nova Poshta warehouses.
     *
     * @param array $options
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getWarehouses($options);


    /**
     * Get Nova Poshta warehouse types.
     * ! It is possible to use not more than once a day!
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getWarehouseTypes();


    /**
     * Get Nova Poshta delivery streets.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getStreet();


    /**
     * Search settlements online.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function searchSettlements();


    /**
     * Search streets online.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function searchSettlementStreets();
}
