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


/**
 * Interface for Payment model.
 *
 * @package  NovaPoshta\Models
 *
 * @link     https://devcenter.novaposhta.ua/docs/services/59a42363ff2c201434937b23
 */
interface PaymentInterface
{

    /**
     * Get cards.
     *
     * @link https://devcenter.novaposhta.ua/docs/services/59a42363ff2c201434937b23/operations/59a42830eea27010d84d6651
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getCards();
}
