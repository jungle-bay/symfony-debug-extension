<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:06
 */

namespace Symfony\Component\Debug\Extension\Tests\Handlers;


use Exception;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;

/**
 * Class InvalidArgumentExceptionHandler
 * @package Symfony\Component\Debug\Extension\Tests\Handlers
 */
class InvalidArgumentExceptionHandler implements ErrorHandlerInterface {

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        var_dump('InvalidArgumentExceptionHandler handle');

        return true;
    }
}
