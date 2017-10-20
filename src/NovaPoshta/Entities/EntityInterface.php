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


/**
 * Interface for Entities.
 *
 * @package NovaPoshta\Entities
 */
interface EntityInterface
{


    /**
     * Set entity.
     *
     * @param mixed $data Some entity data.
     *
     * @return self
     */
    public function set($data);


    /**
     * Get entity.
     *
     * @return \NovaPoshta\Entities\EntityInterface
     */
    public function get();
}
