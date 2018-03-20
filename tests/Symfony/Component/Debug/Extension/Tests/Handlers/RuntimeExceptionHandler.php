<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:04
 */

namespace ErrorHandler\Tests\Handlers;


use Exception;
use ErrorHandler\Api\ErrorHandlerInterface;

/**
 * Class RuntimeExceptionHandler
 * @package ErrorHandler\Tests\Handlers
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
