<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 19.03.18
 * Time: 22:00
 */

namespace ErrorHandler\Tests;


use Exception;
use InvalidArgumentException;
use ErrorHandler\ErrorHandler;
use PHPUnit\Framework\TestCase;
use ErrorHandler\Strategies\SerialStrategy;
use ErrorHandler\Tests\Handlers\ExceptionHandler;
use ErrorHandler\Tests\Handlers\RuntimeExceptionHandler;
use ErrorHandler\Tests\Handlers\InvalidArgumentExceptionHandler;

/**
 * Class ErrorHandlerTest
 * @package ErrorHandler\Tests
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
