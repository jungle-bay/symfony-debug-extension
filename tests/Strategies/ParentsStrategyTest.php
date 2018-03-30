<?php
/**
 * Created by PhpStorm.
 * User: roma_bb8
 * Date: 30.03.18
 * Time: 10:53
 */

namespace Symfony\Component\Debug\Extension\Tests\Strategies;


use Exception;
use RuntimeException;
use InvalidArgumentException;
use Symfony\Component\Debug\Extension\ErrorHandler;
use Symfony\Component\Debug\Extension\Tests\TestCase;
use Symfony\Component\Debug\Extension\Strategies\ParentsStrategy;
use Symfony\Component\Debug\Extension\Tests\Handlers\ExceptionHandler;
use Symfony\Component\Debug\Extension\Exceptions\ErrorHandlerException;
use Symfony\Component\Debug\Extension\Tests\Handlers\RuntimeExceptionHandler;
use Symfony\Component\Debug\Extension\Tests\Handlers\InvalidArgumentExceptionHandler;

/**
 * Class ParentsStrategyTest
 * @package Symfony\Component\Debug\Extension\Tests\Strategies
 */
class ParentsStrategyTest extends TestCase {

    /**
     * @throws ErrorHandlerException
     */
    public function testHandle() {

        $errorHandler = new ErrorHandler(new ParentsStrategy());

        $errorHandler->registerHandler(new InvalidArgumentExceptionHandler(), InvalidArgumentException::class);
        $errorHandler->registerHandler(new RuntimeExceptionHandler(), RuntimeException::class);
        $errorHandler->registerHandler(new ExceptionHandler(), Exception::class);

        $errorHandler->handle(new RuntimeException('Hello World!'));

        $this->assertHandleException(self::getRootFolder() . RuntimeExceptionHandler::FILE);
        $this->assertHandleException(self::getRootFolder() . ExceptionHandler::FILE);
    }
}
