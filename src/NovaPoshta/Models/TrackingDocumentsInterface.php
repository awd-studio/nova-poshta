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
 *
 * @see     https://devcenter.novaposhta.ua/docs/services/556eef34a0fe4f02049c664e/operations/55702cbba0fe4f0cf4fc53ee
 */
interface TrackingDocumentsInterface
{

    /**
     * Track documents status.
     * Method should invoke ModelBase::send() method.
     *
     * @param TrackList $trackList Available track-list.
     *
     * @see \NovaPoshta\Entities\TrackList::__construct
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getStatusDocuments(TrackList $trackList);
}
