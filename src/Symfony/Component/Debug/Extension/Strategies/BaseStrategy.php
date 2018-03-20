<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 19.03.18
 * Time: 23:20
 */

namespace ErrorHandler\Strategies;


use Exception;
use ErrorHandler\Api\ErrorHandlerInterface;

/**
 * Class BaseStrategy
 * @package ErrorHandler\Strategies
 */
abstract class BaseStrategy {

    /**
     * @var ErrorHandlerInterface[] $handlers
     */
    protected $handlers = array();


    /**
     * @param ErrorHandlerInterface $errorHandler
     * @param string $type
     * @return int
     */
    public function registerHandler(ErrorHandlerInterface $errorHandler, $type = '') {

        if ('' === $type) return array_push($this->handlers, $errorHandler);

        $this->handlers[$type] = $errorHandler;

        return count($this->handlers);
    }


    /**
     * @param Exception $exception
     * @return bool Did you manage to process the error.
     */
    abstract public function handle(Exception $exception);
}
