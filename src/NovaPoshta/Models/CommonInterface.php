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
 * Interface for Commons.
 *
 * @package  NovaPoshta\Models
 *
 * @link     https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed
 */
interface CommonInterface
{

    /**
     * Get time intervals.
     *
     * @param string $recipientCityRef RecipientCityRef
     * @param string $dateTime         DateTime
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890f
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTimeIntervals($recipientCityRef, $dateTime = null);


    /**
     * Get cargo types.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838909
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getCargoTypes();


    /**
     * Get backward delivery cargo types.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838907
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getBackwardDeliveryCargoTypes();


    /**
     * Get pallets list.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/5824774ba0fe4f0e60694eb0
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getPalletsList();


    /**
     * Get types of payers.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838913
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTypesOfPayers();


    /**
     * Get types of payers for redelivery.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838914
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTypesOfPayersForRedelivery();


    /**
     * Get pack list.
     *
     * @param string $length        (optional)
     * @param string $width         (optional)
     * @param string $height        (optional)
     * @param string $typeOfPacking (optional)
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/582b1069a0fe4f0298618f06
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getPackList(
      $length = null,
      $width = null,
      $height = null,
      $typeOfPacking = null
    );


    /**
     * Get tires wheels list.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838910
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTiresWheelsList();


    /**
     * Get cargo description list.
     *
     * @param string $findByString (optional)
     * @param int    $page         (optional)
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838908
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getCargoDescriptionList($findByString = null, $page = null);


    /**
     * Get message code text.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/58f0730deea270153c8be3cd
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getMessageCodeText();


    /**
     * Get service types.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890e
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getServiceTypes();


    /**
     * Get types of counterparties.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838912
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTypesOfCounterparties();


    /**
     * Get payment forms.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890d
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getPaymentForms();


    /**
     * Get ownership forms list.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890b
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getOwnershipFormsList();
}
