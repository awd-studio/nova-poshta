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
 * @package  NovaPoshta\Models
 *
 * @link     https://devcenter.novaposhta.ua/docs/services/55662bd3a0fe4f10086ec96e
 */
interface ScanSheetInterface
{

    /**
     * Add express documents.
     *
     * ToDo: Implement the method
     *
     * @param DocumentRefs $documentRefs
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55662bd3a0fe4f10086ec96e/operations/556c4786a0fe4f0634657b65
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function insertDocuments();


    /**
     * Get scan sheet.
     *
     * ToDo: Implement the method
     *
     * @param Ref             $ref
     * @param CounterpartyRef $counterpartyRef
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55662bd3a0fe4f10086ec96e/operations/556c72d7a0fe4f08e8f7ce30
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getScanSheet();


    /**
     * Get scan sheet list.
     *
     * ToDo: Implement the method
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55662bd3a0fe4f10086ec96e/operations/556c7734a0fe4f08e8f7ce31
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getScanSheetList();


    /**
     * Delete (unformate) scan sheet.
     *
     * ToDo: Implement the method
     *
     * @param ScanSheetRefs|array $scanSheetRefs
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55662bd3a0fe4f10086ec96e/operations/556c6a2da0fe4f08e8f7ce2f
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function deleteScanSheet();


    /**
     * Remove documents.
     *
     * ToDo: Implement the method
     *
     * @param DocumentRefs|array $documentRefs
     * @param Ref                $ref
     *
     * @link https://devcenter.novaposhta.ua/docs/services/55662bd3a0fe4f10086ec96e/operations/556c6474a0fe4f08e8f7ce2e
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function removeDocuments();
}
