<?php
/**
 * Created by PhpStorm.
 * User: m2e
 * Date: 20.03.18
 * Time: 9:36
 */

namespace ErrorHandler\Strategies;


use Exception;
use ErrorHandler\Api\ErrorHandlerInterface;
use ErrorHandler\Exceptions\ErrorHandlerException;

/**
 * Class SimpleStrategy
 * @package ErrorHandler\Strategies
 */
class SimpleStrategy extends BaseStrategy {

    /**
     * @param Exception $exception
     * @return string
     * @throws ErrorHandlerException
     */
    protected function identifyExceptionType(Exception $exception) {

        $type = get_class($exception);

        if (false === $type) throw new ErrorHandlerException('It is impossible to determine the error type.');

        return $type;
    }

    /**
     * @param string $type
     * @param Exception $exception
     * @return bool
     */
    protected function run($type, $exception) {

        if (false === array_key_exists($type, $this->handlers)) return false;

        /** @var ErrorHandlerInterface $handler */
        $handler = $this->handlers[$type];

        return $handler->handle($exception);
    }


    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        $type = $this->identifyExceptionType($exception);

        return $this->run($type, $exception);
    }
}