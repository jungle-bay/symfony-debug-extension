<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:03
 */

namespace Symfony\Component\Debug\Extension\Tests\Handlers;


use Exception;
use Symfony\Component\Debug\Extension\Tests\TestCase;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;

/**
 * Class ExceptionHandler
 * @package Symfony\Component\Debug\Extension\Tests\Handlers
 */
class ExceptionHandler implements ErrorHandlerInterface {

    const FILE = 'exception_handler';

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        file_put_contents(TestCase::getRootFolder() . self::FILE, '1', FILE_APPEND | LOCK_EX);

        return false;
    }
}
