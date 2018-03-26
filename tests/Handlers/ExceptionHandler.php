<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:03
 */

namespace Symfony\Component\Debug\Extension\Tests\Handlers;


use Exception;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;

/**
 * Class ExceptionHandler
 * @package Symfony\Component\Debug\Extension\Tests\Handlers
 */
class ExceptionHandler implements ErrorHandlerInterface {

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        var_dump('ExceptionHandler handle');

        return false;
    }
}
