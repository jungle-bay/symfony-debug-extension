<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 17.03.18
 * Time: 23:20
 */

namespace Symfony\Component\Debug\Extension\Api;


use Exception;

/**
 * Interface ErrorHandlerInterface
 * @package Symfony\Component\Debug\Extension\Api
 */
interface ErrorHandlerInterface {

    /**
     * @param Exception $exception
     * @return bool
     */
    public function handle(Exception $exception);
}
