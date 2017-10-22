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
 * Class Payment
 *
 * @package NovaPoshta\Models
 */
class Payment extends ModelBase implements PaymentInterface
{

    /**
     * ModelBase name Id.
     *
     * @return string
     */
    public function getModelId()
    {
        return 'Payment';
    }


    /**
     * Get cards.
     *
     * @see https://devcenter.novaposhta.ua/docs/services/59a42363ff2c201434937b23/operations/59a42830eea27010d84d6651
     *
     * @return \NovaPoshta\Http\Response
     */
    public function getCards()
    {
        $this->setCalledMethod('getCards');

        return $this->send();
    }
}
