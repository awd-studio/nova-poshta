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

/**
 * Class NpExceptionTest
 *
 * @package NovaPoshta\Tests\Exceptions
 */
final class NpExceptionTest extends TestCase
{

    /**
     * @covers \NovaPoshta\Exceptions\NpException::__construct
     */
    public function testNpExceptionInstance()
    {
        $this->expectException(NpException::class);

        throw new NpException('Test');
    }
}
