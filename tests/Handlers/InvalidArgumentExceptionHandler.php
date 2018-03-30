<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:06
 */

namespace Symfony\Component\Debug\Extension\Tests\Handlers;


use Exception;
use Symfony\Component\Debug\Extension\Tests\TestCase;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;

/**
 * Class InvalidArgumentExceptionHandler
 * @package Symfony\Component\Debug\Extension\Tests\Handlers
 */
class InvalidArgumentExceptionHandler implements ErrorHandlerInterface {

    const FILE = 'invalid_argument_exception_handler';

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        file_put_contents(TestCase::getRootFolder() . self::FILE, '1', FILE_APPEND | LOCK_EX);

        return true;
    }
}
