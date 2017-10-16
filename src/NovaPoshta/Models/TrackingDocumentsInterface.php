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

use NovaPoshta\Entities\TrackList;


/**
 * Interface TrackingDocumentsInterface
 *
 * @package NovaPoshta\Models
 */
interface TrackingDocumentsInterface
{


    /**
     * Create document.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function save();


    /**
     * Update document.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function update();


    /**
     * Delete document.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function delete();

    /**
     * Track documents status.
     * Method should invoke Model::send() method.
     *
     * @param TrackList $trackList Available track-list.
     *
     * @see \NovaPoshta\Entities\TrackList::__construct
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getStatusDocuments(TrackList $trackList);


    /**
     * Document calculation of cost.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getDocumentPrice();


    /**
     * Calculation of delivery date.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getDocumentDeliveryDate();


    /**
     * Get document list.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function getDocumentList();


    /**
     * Generate report about document list.
     *
     * ToDo: Implement the method
     *
     * @return \NovaPoshta\Http\Response
     */
    //public function generateReport();
}
