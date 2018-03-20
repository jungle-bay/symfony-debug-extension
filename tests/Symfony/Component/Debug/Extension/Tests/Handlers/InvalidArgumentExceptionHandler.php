<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:06
 */

namespace ErrorHandler\Tests\Handlers;


use Exception;
use ErrorHandler\Api\ErrorHandlerInterface;

/**
 * Class InvalidArgumentExceptionHandler
 * @package ErrorHandler\Tests\Handlers
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
