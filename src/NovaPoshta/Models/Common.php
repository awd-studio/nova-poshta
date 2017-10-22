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
 * Class Common
 *
 * @package NovaPoshta\Models
 */
class Common extends Model implements CommonInterface
{


    /**
     * Model name Id.
     *
     * @return string
     */
    public function getModelId()
    {
        return 'Common';
    }


    /**
     * Get cargo types.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838909
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getCargoTypes()
    {
        $this->setCalledMethod('getCargoTypes');

        return $this->send();
    }


    /**
     * Get backward delivery cargo types.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838907
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getBackwardDeliveryCargoTypes()
    {
        $this->setCalledMethod('getBackwardDeliveryCargoTypes');

        return $this->send();
    }


    /**
     * Get pallets list.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/5824774ba0fe4f0e60694eb0
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getPalletsList()
    {
        $this->setCalledMethod('getPalletsList');

        return $this->send();
    }


    /**
     * Get types of payers.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838913
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTypesOfPayers()
    {
        $this->setCalledMethod('getTypesOfPayers');

        return $this->send();
    }


    /**
     * Get types of payers for redelivery.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838914
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTypesOfPayersForRedelivery()
    {
        $this->setCalledMethod('getTypesOfPayersForRedelivery');

        return $this->send();
    }


    /**
     * Get pack list.
     *
     * @param string $length        (optional) Length
     * @param string $width         (optional) Width
     * @param string $height        (optional) Height
     * @param string $typeOfPacking (optional) TypeOfPacking
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/582b1069a0fe4f0298618f06
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getPackList(
      $length = null,
      $width = null,
      $height = null,
      $typeOfPacking = null
    ) {
        $this->setCalledMethod('getPackList');
        $this->setMethodProperties([
          'Length'        => $length,
          'Width'         => $width,
          'Height'        => $height,
          'TypeOfPacking' => $typeOfPacking,
        ]);

        return $this->send();
    }


    /**
     * Get tires wheels list.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838910
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTiresWheelsList()
    {
        $this->setCalledMethod('getTiresWheelsList');

        return $this->send();
    }


    /**
     * Get cargo description list.
     *
     * @param  string $findByString (optional) FindByString
     * @param  int    $page         (optional) Page
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838908
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getCargoDescriptionList($findByString = null, $page = null)
    {
        $this->setCalledMethod('getCargoDescriptionList');
        $this->setMethodProperties([
          'FindByString' => $findByString,
          'Page'         => $page,
        ]);

        return $this->send();
    }


    /**
     * Get message code text.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/58f0730deea270153c8be3cd
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getMessageCodeText()
    {
        $this->setCalledMethod('getMessageCodeText');

        return $this->send();
    }


    /**
     * Get service types.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890e
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getServiceTypes()
    {
        $this->setCalledMethod('getServiceTypes');

        return $this->send();
    }


    /**
     * Get types of counterparties.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b64838912
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTypesOfCounterparties()
    {
        $this->setCalledMethod('getTypesOfCounterparties');

        return $this->send();
    }


    /**
     * Get payment forms.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890d
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getPaymentForms()
    {
        $this->setCalledMethod('getPaymentForms');

        return $this->send();
    }


    /**
     * Get ownership forms list.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890b
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getOwnershipFormsList()
    {
        $this->setCalledMethod('getOwnershipFormsList');

        return $this->send();
    }


    /**
     * Get time intervals.
     *
     * @param string $recipientCityRef RecipientCityRef
     * @param string $dateTime         DateTime
     *
     * @see https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed/operations/55702571a0fe4f0b6483890f
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getTimeIntervals($recipientCityRef, $dateTime = null)
    {
        $this->setCalledMethod('getTimeIntervals');
        $this->setMethodProperties([
          'RecipientCityRef' => $recipientCityRef,
          'DateTime'         => $dateTime,
        ]);

        return $this->send();
    }
}
