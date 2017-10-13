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
 */
class TrackingDocument extends Model
{

    /**
     * Valid tracking number.
     *
     * @var TrackList
     */
    protected $trackList;

    /**
     * Model name Id.
     *
     * @return string
     */
    public function getModelId()
    {
        return 'TrackingDocument';
    }

    /**
     * @return TrackList
     */
    public function getTrackList()
    {
        return $this->trackList;
    }

    /**
     * @param mixed $trackList
     */
    public function setTrackList($trackList)
    {
        $this->trackList = $trackList;
    }

    /**
     * Track package.
     *
     * @param Settings $settings
     * @param mixed    $trackNumbers
     *
     * @return string
     */
    public static function track(Settings $settings, $trackNumbers)
    {
        $model = new self($settings);
        $model->setCalledMethod('getStatusDocuments');

        $trackList = new TrackList($trackNumbers);

        $model->setTrackList($trackList);

        return $model->send();
    }

    /**
     * Build data for methodProperties item.
     *
     * @return array
     */
    public function getMethodProperties()
    {
        return [
          'Documents' => $this->trackList->getAll(),
        ];
    }
}
