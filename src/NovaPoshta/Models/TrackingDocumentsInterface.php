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
}
