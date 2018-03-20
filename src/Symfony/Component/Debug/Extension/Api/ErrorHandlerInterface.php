<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 17.03.18
 * Time: 23:20
 */

namespace ErrorHandler\Api;


use Exception;

/**
 * Interface ErrorHandlerInterface
 * @package ErrorHandler\Api
 */
interface ErrorHandlerInterface {

    /**
     * @param Exception $exception
     * @return bool
     */
    public function handle(Exception $exception);
}
