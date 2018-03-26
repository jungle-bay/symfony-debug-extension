<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 19.03.18
 * Time: 22:00
 */

namespace Symfony\Component\Debug\Extension\Tests;


use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Debug\Extension\ErrorHandler;
use Symfony\Component\Debug\Extension\Strategies\SerialStrategy;
use Symfony\Component\Debug\Extension\Tests\Handlers\ExceptionHandler;
use Symfony\Component\Debug\Extension\Tests\Handlers\RuntimeExceptionHandler;
use Symfony\Component\Debug\Extension\Tests\Handlers\InvalidArgumentExceptionHandler;

/**
 * Class ErrorHandlerTest
 * @package Symfony\Component\Debug\Extension\Tests
 */
class ErrorHandlerTest extends TestCase {

    /**
     * @throws Exception
     */
    public function testHandle() {

        $errorHandler = new ErrorHandler(new SerialStrategy());
        $errorHandler = ErrorHandler::registerExtension($errorHandler);

        $errorHandler->registerHandler(new ExceptionHandler());
        $errorHandler->registerHandler(new RuntimeExceptionHandler());
        $errorHandler->registerHandler(new InvalidArgumentExceptionHandler());

        $errorHandler->handle(new InvalidArgumentException('Hello world.'));
    }
}
