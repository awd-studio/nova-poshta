<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Entities;


use Iterator;
use NovaPoshta\Exceptions\NpException;


/**
 * Class TrackList
 *
 * @package NovaPoshta\Entities
 */
class TrackList implements Iterator
{

    private $position = 0;

    /**
     * Tracks.
     *
     * @var array
     */
    private $container = array();


    /**
     * TrackList constructor.
     *
     * You can use one of available track-list:
     * 1. Single track
     * 2. Array of tracks-list
     * 3. Array of arrays with keys "DocumentNumber" and "Phone"
     *
     * Example:
     * 1. $tracks = "01234567890123";
     * 2. $tracks = ["01234567890123", "01234567890124"];
     * 3. $tracks = [
     *    [
     *      "DocumentNumber" => "01234567890123",
     *      "Phone" => "3809901234567"
     *    ],
     *    ["DocumentNumber" => "01234567890123"],
     * ];
     *
     * @param mixed $tracks
     *
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function __construct($tracks)
    {
        if (is_string($tracks)) {
            $this->addTrack($tracks);
        } elseif (is_array($tracks)) {
            if (isset($tracks['DocumentNumber'])) {
                $this->addTrack(array_values($tracks));
            } else {
                foreach ($tracks as $track) {
                    $this->addTrack($track);
                }
            }
        } elseif ($tracks instanceof Track) {
            /** @var Track $track */
            foreach ($tracks as $track) {
                $this->container[$track->getId()] = $track->build();
            }
        } else {
            throw new NpException('Invalid track numbers!');
        }
    }


    /**
     * Get all tracks in list container.
     *
     * @return array
     */
    public function getAll()
    {
        return array_values($this->container);
    }


    /**
     * Get track from list
     *
     * @param int $trackId
     *
     * @return \NovaPoshta\Entities\Track
     */
    public function getTrack($trackId)
    {
        return isset($this->container[$trackId])
          ?
          Track::create($this->container[$trackId])
          :
          null;
    }


    /**
     * @param mixed  $documentNumber
     * @param string $phone
     */
    public function addTrack($documentNumber, $phone = '')
    {
        $track = Track::create($documentNumber, $phone);

        $this->container[$track->getId()] = $track->build();
    }


    /**
     * Return the current element
     *
     * @link  http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->container[$this->position];
    }


    /**
     * Move forward to next element
     *
     * @link  http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->position;
    }


    /**
     * Return the key of the current element
     *
     * @link  http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->position;
    }


    /**
     * Checks if current position is valid
     *
     * @link  http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then
     *                 evaluated. Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset($this->container[$this->position]);
    }


    /**
     * Rewind the Iterator to the first element
     *
     * @link  http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }
}
