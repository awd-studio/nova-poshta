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
 * Interface for AdditionalService
 *
 * @package  NovaPoshta\Models
 *
 * @link     https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649
 */
interface AdditionalServiceInterface
{

    /**
     * Save additional service.
     *
     * ToDo: Implement the method
     *
     * @param string $intDocNumber     IntDocNumber [max 36 chars]
     * @param string $paymentMethod    PaymentMethod [max 36 chars]
     * @param string $reason           Reason (Ref) [max 36 chars]
     * @param string $subtypeReason    SubtypeReason (Ref) [max 36 chars]
     * @param string $note             (optional) Note [max 100 chars]
     * @param string $orderType        OrderType [max 36 chars]
     * @param string $returnAddressRef ReturnAddressRef (Ref) [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649/operations/58b6d227ff2c200cd80adb94
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save();


    /**
     * Delete additional service.
     *
     * ToDo: Implement the method
     *
     * @param string $ref Ref [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649/operations/58b6cdf4ff2c200cd80adb93
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();


    /**
     * Check possibility create return.
     *
     * ToDo: Implement the method
     *
     * @param int $number Number of document [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649/operations/58b6b830ff2c200cd80adb91
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function CheckPossibilityCreateReturn($number);


    /**
     * Get return reasons.
     *
     * ToDo: Implement the method
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649/operations/58b6cd6aeea2700d141ccae1
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getReturnReasons();


    /**
     * Get return reasons subtypes.
     *
     * ToDo: Implement the method
     *
     * @param string $reasonRef ReasonRef
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649/operations/58b6cdb2ff2c200cd80adb92
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getReturnReasonsSubtypes($reasonRef);


    /**
     * Get return orders list.
     *
     * ToDo: Implement the method
     *
     * @param int    $number    (optional) Number [max 36 chars]
     * @param string $ref       (optional) Ref (Ref) [max 36 chars]
     * @param int    $beginDate (optional) BeginDate [max 36 chars]
     * @param int    $endDate   (optional) EndDate [max 36 chars]
     * @param string $page      (optional) Page [max 36 chars]
     * @param string $limit     (optional) Limit [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58ad7185eea27006cc36d649/operations/58b6cdc9eea2700d141ccae2
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getReturnOrdersList();
}
