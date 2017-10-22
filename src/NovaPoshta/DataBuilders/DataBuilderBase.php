<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\DataBuilders;

use Countable;
use Iterator;
use NovaPoshta\Exceptions\NpException;


/**
 * Basement class for DataBuilders
 *
 * @package NovaPoshta\DataBuilders
 */
class DataBuilderBase implements Iterator, Countable, DataInterface
{

    /**
     * Data storage.
     *
     * @var \NovaPoshta\DataBuilders\DataInterface $data
     */
    protected $data = [];


    /**
     * DataBuilderBase constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }


    /**
     * Set data property.
     *
     * @param array|string $property Properties array or property name.
     * @param mixed        $value    Property value.
     *
     * @return \NovaPoshta\DataBuilders\DataInterface
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function set($property, $value = null)
    {
        if (is_array($property)) {
            $this->data = array_merge_recursive($this->data, $property);
        } elseif (is_string($property)) {
            $this->data[$property] = $value;
        } else {
            throw new NpException('Invalid data type of property! Supported only array or string.');
        }

        return $this;
    }


    /**
     * Get data property.
     *
     * @param string $property Property name. If empty - will return all data.
     *
     * @return mixed
     */
    public function get($property = null)
    {
        if (isset($property)) {
            return isset($this->data[$property]) ? $this->data[$property] : null;
        }

        return $this->data;
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
        return current($this->data);
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
        next($this->data);
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
        return key($this->data);
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
        $key = key($this->data);

        return ($key !== null && $key !== false);
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
        reset($this->data);
    }


    /**
     * Count elements of an object
     *
     * @link  http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}
