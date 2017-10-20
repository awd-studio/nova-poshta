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
 * Interface ContactPerson
 *
 * @package NovaPoshta\Models
 *
 * @see     https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/55828c4ca0fe4f0adc08ef27
 */
interface ContactPersonInterface
{

    /**
     * Save contact person.
     *
     * ToDo: Implement the method
     *
     * @param CounterpartyRef $counterpartyRef
     * @param FirstName       $firstName
     * @param LastName        $lastName
     * @param MiddleName      $middleName (optional)
     * @param Phone           $phone
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/55828c4ca0fe4f0adc08ef27
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save();


    /**
     * Update contact person.
     *
     * ToDo: Implement the method
     *
     * @param Ref        $ref
     * @param FirstName  $firstName
     * @param LastName   $lastName
     * @param MiddleName $middleName (optional)
     * @param Phone      $phone
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/558297aca0fe4f0adc08ef28
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function update();


    /**
     * Delete contact person.
     *
     * ToDo: Implement the method
     *
     * @param Ref $ref
     *
     * @see https://devcenter.novaposhta.ua/docs/services/557eb8c8a0fe4f02fc455b2d/operations/55829aa2a0fe4f0adc08ef29
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();
}
