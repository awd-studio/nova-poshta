<?php

/**
 * @file
 * This file is part of Nova-Poshta PHP library.
 *
 * @author   Anton Karpov <awd.com.ua@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/awd-studio/nova-poshta
 */

namespace NovaPoshta\Tests\Exceptions;


use NovaPoshta\Exceptions\NpException;
use PHPUnit\Framework\TestCase;

final class NpExceptionTest extends TestCase
{

    public function testNpExceptionInstance()
    {
        $this->expectException(NpException::class);

        throw new NpException('Test');
    }
}
