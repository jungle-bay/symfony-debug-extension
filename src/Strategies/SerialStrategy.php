<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 18.03.18
 * Time: 23:01
 */

namespace Symfony\Component\Debug\Extension\Strategies;


use Exception;

/**
 * Class SerialStrategy
 * @package Symfony\Component\Debug\Extension\Strategies
 */
class SerialStrategy extends BaseStrategy {

    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        while (null !== ($handler = array_shift($this->handlers))) {

            $isProcessed = $handler->handle($exception);

            if (false === $isProcessed) {
                continue;
            }

            return true;
        }

        return false;
    }
}
