<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:04
 */

namespace Symfony\Component\Debug\Extension\Tests\Handlers;


use Exception;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;

/**
 * Class RuntimeExceptionHandler
 * @package Symfony\Component\Debug\Extension\Tests\Handlers
 */
class RuntimeExceptionHandler implements ErrorHandlerInterface {

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        var_dump('RuntimeExceptionHandler handle');

        return true;
    }
}
