<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:04
 */

namespace Symfony\Component\Debug\Extension\Tests\Handlers;


use Exception;
use Symfony\Component\Debug\Extension\Tests\TestCase;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;

/**
 * Class RuntimeExceptionHandler
 * @package Symfony\Component\Debug\Extension\Tests\Handlers
 */
class RuntimeExceptionHandler implements ErrorHandlerInterface {

    const FILE = 'runtime_exception_handler';

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        file_put_contents(TestCase::getRootFolder() . self::FILE, '1', FILE_APPEND | LOCK_EX);

        return true;
    }
}
