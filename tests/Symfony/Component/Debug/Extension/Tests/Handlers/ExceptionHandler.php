<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 20.03.18
 * Time: 1:03
 */

namespace ErrorHandler\Tests\Handlers;


use Exception;
use ErrorHandler\Api\ErrorHandlerInterface;

/**
 * Class ExceptionHandler
 * @package ErrorHandler\Tests\Handlers
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
