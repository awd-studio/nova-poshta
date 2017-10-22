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


/**
 * Interface AddressInterface
 *
 * @package NovaPoshta\Models
 *
 * @see     https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43
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
     * @param string $counterpartyRef CounterpartyRef [max 36 char]
     * @param string $streetRef       StreetRef       [max 36 char]
     * @param string $buildingNumber  BuildingNumber
     * @param string $flat            Flat
     * @param string $note            (optional) Note [max 36 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d9925a0fe4f08e8f7ce4a
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save();


    /**
     * Update counterpart address.
     *
     * ToDo: Implement the method
     *
     * @param string $ref             (optional) Ref             [max 36 char]
     * @param string $counterpartyRef (optional) CounterpartyRef [max 36 char]
     * @param string $streetRef       (optional) StreetRef       [max 36 char]
     * @param string $buildingNumber  (optional) BuildingNumber
     * @param string $flat            (optional) Flat
     * @param string $note            (optional) Note            [max 40 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d9db5a0fe4f08e8f7ce4b
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function update();


    /**
     * Dalete counterpart address.
     *
     * ToDo: Implement the method
     *
     * @param string $ref Ref [max 36 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556da062a0fe4f08e8f7ce4c
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();


    /**
     * Get cities.
     *
     * ToDo: Implement the method
     *
     * @param string $ref          (optional) Ref [max 36 char]
     * @param int    $page         (optional) Page
     * @param string $findByString (optional) FindByString
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d885da0fe4f08e8f7ce46
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getCities();


    /**
     * Get Nova Poshta settlements.
     *
     * ToDo: Implement the method
     *
     * ToDo: Check needle method ("AddressGeneral" or "Address")
     *
     * @param string $ref          (optional) Ref          [max 36 char]
     * @param string $regionRef    (optional) RegionRef    [max 36 char]
     * @param string $findByString (optional) FindByString [max 36 char]
     * @param string $warehouse    (optional) Warehouse    [max 36 char]
     * @param string $page         (optional) Page         [max 36 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/56248fffa0fe4f0da0550ea8
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getSettlements();


    /**
     * Get geographic areas.
     *
     * ToDo: Implement the method
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d9130a0fe4f08e8f7ce48
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getAreas();


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
    public function getWarehouses(array $options = []);


    /**
     * Get Nova Poshta warehouse types.
     * ! It is possible to use not more than once a day!
     *
     * ToDo: Implement the method
     *
     * @param string $ [max 36 char]
     *
     * @see
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getWarehouseTypes();


    /**
     * Get Nova Poshta delivery streets.
     *
     * ToDo: Implement the method
     *
     * @param string $cityRef      CityRef         [max 36 char]
     * @param string $findByString FindByString    [max 36 char]
     * @param int    $page         (optional) Page [max 10 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d8db0a0fe4f08e8f7ce47
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getStreet();


    /**
     * Search settlements online.
     *
     * ToDo: Implement the method
     *
     * @param string $cityName CityName [max 36 char]
     * @param int    $limit    Limit    [max 36 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/58e5ebeceea27017bc851d67
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function searchSettlements();


    /**
     * Search streets online.
     *
     * ToDo: Implement the method
     *
     * @param string $streetName    StreetName    [max 36 char]
     * @param string $settlementRef SettlementRef [max 36 char]
     * @param int    $limit         Limit         [max 36 char]
     *
     * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/58e5f369eea27017540b58ac
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function searchSettlementStreets();
}
