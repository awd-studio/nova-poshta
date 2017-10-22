<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Http;


use \NovaPoshta\Models\ModelBase;


/**
 * Interface HttpInterface
 *
 * @package NovaPoshta\Http
 */
interface HttpInterface
{

    /**
     * Execute request.
     *
     * @param ModelBase $model
     *
     * @return string
     * @throws \NovaPoshta\Exceptions\NpException
     */
    public function send(ModelBase $model);
}
