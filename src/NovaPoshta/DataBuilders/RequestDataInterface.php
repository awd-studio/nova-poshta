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

use NovaPoshta\Models\ModelBase;


/**
 * Interface for DataBuilders.
 *
 * @package NovaPoshta\DataBuilders
 */
interface RequestDataInterface
{

    /**
     * @param \NovaPoshta\Models\ModelBase $model
     *
     * @return \NovaPoshta\DataBuilders\RequestDataInterface
     */
    public function build(ModelBase $model);
}
