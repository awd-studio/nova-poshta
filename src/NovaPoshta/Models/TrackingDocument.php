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
use NovaPoshta\Settings\Settings;


/**
 * Class TrackingDocument
 *
 * @package NovaPoshta\Models
 *
 * @see     https://devcenter.novaposhta.ua/docs/services/556eef34a0fe4f02049c664e/operations/55702cbba0fe4f0cf4fc53ee
 */
class TrackingDocument extends ModelBase implements TrackingDocumentsInterface
{

    /**
     * Valid tracking number.
     *
     * @see \NovaPoshta\Entities\TrackList::__construct
     *
     * @var TrackList
     */
    protected $trackList;


    /**
     * ModelBase name Id.
     *
     * @return string
     */
    public function getModelId()
    {
        return 'TrackingDocument';
    }


    /**
     * @param mixed $trackList
     *
     * @see \NovaPoshta\Entities\TrackList::__construct()
     */
    public function setTrackList($trackList)
    {
        $this->trackList = $trackList;
    }


    /**
     * @return TrackList
     */
    public function getTrackList()
    {
        return $this->trackList;
    }


    /**
     * Track documents status.
     *
     * @param TrackList $trackList Available track-list.
     *
     * @see \NovaPoshta\Entities\TrackList::__construct
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getStatusDocuments(TrackList $trackList)
    {
        $this->setTrackList($trackList);

        $this->setCalledMethod('getStatusDocuments');
        $this->setMethodProperties([
          'Documents' => $this->getTrackList()->getAllTracks(),
        ]);

        return $this->send();
    }


    /**
     * Track package.
     *
     * @param Settings $settings
     * @param mixed    $trackList
     *
     * @see \NovaPoshta\Entities\TrackList::__construct
     *
     * @return array|string
     */
    public static function track(Settings $settings, $trackList)
    {
        $model    = new self($settings);
        $response = $model->getStatusDocuments(new TrackList($trackList));

        return $response->getResponse();
    }
}
