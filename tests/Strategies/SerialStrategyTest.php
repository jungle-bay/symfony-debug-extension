<?php
/**
 * Created by PhpStorm.
 * User: roma_bb8
 * Date: 30.03.18
 * Time: 10:53
 */

namespace Symfony\Component\Debug\Extension\Tests\Strategies;


use RuntimeException;
use Symfony\Component\Debug\Extension\ErrorHandler;
use Symfony\Component\Debug\Extension\Tests\TestCase;
use Symfony\Component\Debug\Extension\Strategies\SerialStrategy;
use Symfony\Component\Debug\Extension\Tests\Handlers\ExceptionHandler;
use Symfony\Component\Debug\Extension\Exceptions\ErrorHandlerException;
use Symfony\Component\Debug\Extension\Tests\Handlers\RuntimeExceptionHandler;
use Symfony\Component\Debug\Extension\Tests\Handlers\InvalidArgumentExceptionHandler;

/**
 * Class SerialStrategyTest
 * @package Symfony\Component\Debug\Extension\Tests\Strategies
 */
class SerialStrategyTest extends TestCase {

    /**
     * @throws ErrorHandlerException
     */
    public function testHandle() {

        $errorHandler = new ErrorHandler(new SerialStrategy());

        $errorHandler->registerHandler(new ExceptionHandler());
        $errorHandler->registerHandler(new InvalidArgumentExceptionHandler());
        $errorHandler->registerHandler(new RuntimeExceptionHandler());

        $errorHandler->handle(new RuntimeException('Hello World!'));

        $this->assertHandleException(self::getRootFolder() . ExceptionHandler::FILE);
        $this->assertHandleException(self::getRootFolder() . InvalidArgumentExceptionHandler::FILE);
    }
}
