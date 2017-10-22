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
 * Interface for AdditionalServiceGeneral model.
 *
 * @package NovaPoshta\Models
 *
 * @link    https://devcenter.novaposhta.ua/docs/services/58f722b3ff2c200c04673bd1
 */
interface AdditionalServiceGeneralInterface
{

    /**
     * Save.
     *
     * ToDo: Implement the method
     *
     * @param string $orderType OrderType [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58f722b3ff2c200c04673bd1/operations/58f72344ff2c200c04673bd3
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save();


    /**
     * Delete.
     *
     * ToDo: Implement the method
     *
     * @param string $ref       Ref [max 36 chars]
     * @param string $orderType OrderType - constant "orderRedirecting"
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58f722b3ff2c200c04673bd1/operations/58f7237bff2c200c04673bd4
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();


    /**
     * Check possibility for redirecting.
     *
     * ToDo: Implement the method
     *
     * @param int    $orderType                 OrderType - "orderRedirecting"
     *                                          constant [max 36 chars]
     * @param int    $intDocNumber              IntDocNumber [max 36 chars]
     * @param string $customer                  Customer [max 36 chars]
     * @param string $recipientSettlement       RecipientSettlement
     *                                          [max 36 chars]
     * @param string $recipientSettlementStreet RecipientSettlementStreet
     *                                          [max 36 chars]
     * @param string $buildingNumber            BuildingNumber [max 36 chars]
     * @param string $noteAddressRecipient      NoteAddressRecipient
     *                                          [max 45 chars]
     * @param string $recipientWarehouse        RecipientWarehouse
     *                                          [max 36 chars]
     * @param string $recipient                 Recipient [max 36 chars]
     * @param string $recipientContactName      RecipientContactName
     *                                          [max 36 chars]
     * @param string $recipientPhone            RecipientPhone [max 36 chars]
     * @param string $payerType                 PayerType [max 36 chars]
     * @param string $paymentMethod             PaymentMethod [max 36 chars]
     * @param string $note                      Note [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58f722b3ff2c200c04673bd1/operations/58f7233eff2c200c04673bd2
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function checkPossibilityForRedirecting();


    /**
     * Get redirection orders-list.
     *
     * ToDo: Implement the method
     *
     * @param int    $number    (optional) Number [max 36 chars]
     * @param string $ref       (optional) Ref [max 36 chars]
     * @param int    $beginDate (optional) BeginDate [max 36 chars]
     * @param int    $endDate   (optional) EndDate [max 36 chars]
     * @param string $page      (optional) Page [max 36 chars]
     * @param string $limit     (optional) Limit [max 36 chars]
     *
     * @link https://devcenter.novaposhta.ua/docs/services/58f722b3ff2c200c04673bd1/operations/58f72396ff2c200c04673bd5
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getRedirectionOrdersList();
}
