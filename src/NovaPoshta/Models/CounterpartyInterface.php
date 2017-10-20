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
 * @see     https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d
 */
interface CounterpartyInterface
{

    /**
     * Save counterpart.
     *
     * ToDo: Implement the method
     *
     * @param CityRef              $cityRef
     * @param FirstName            $firstName
     * @param MiddleName           $middleName
     * @param LastName             $lastName
     * @param Phone                $phone
     * @param Email                $email
     * @param CounterpartyType     $counterpartyType
     * @param CounterpartyProperty $counterpartyProperty
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/557ebbd3a0fe4f02fc455b2e
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save(Ref $ref);


    /**
     * Update counterpart.
     *
     * ToDo: Implement the method
     *
     * @param Ref        $ref
     * @param CityRef    $cityRef
     * @param FirstName  $firstName
     * @param MiddleName $middleName
     * @param LastName   $lastName
     * @param Phone      $phone
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/557ebbd3a0fe4f02fc455b2e
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function update(Ref $ref);


    /**
     * Delete counterpart.
     *
     * ToDo: Implement the method
     *
     * @param Ref $ref
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/557fd35da0fe4f105c08760e
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();


    /**
     * Get counterpart list.
     *
     * ToDo: Implement the method
     *
     * @param Ref $ref
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/557fdcb4a0fe4f105c087611
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getCounterpartyAddresses(Ref $ref);


    /**
     * Get counterparty options.
     *
     * ToDo: Implement the method
     *
     * @param Ref $ref
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/55801976a0fe4f105c087614
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getCounterpartyOptions(Ref $ref);


    /**
     * Get counterparty contact persons.
     *
     * ToDo: Implement the method
     *
     * @param Ref  $ref
     * @param Page $page Page number
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/557fe424a0fe4f105c087612
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getCounterpartyContactPerson(Ref $ref);


    /**
     * Get counterparties.
     *
     * ToDo: Implement the method
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/557fd789a0fe4f105c08760f
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getCounterparties(Ref $ref);
}
