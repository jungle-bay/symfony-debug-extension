<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <jungle.romabb8@gmail.com>
 * Date: 18.01.18
 * Time: 18:46
 */

namespace Symfony\Component\Debug\Extension;


use Exception;
use Symfony\Component\Debug\BufferingLogger;
use Symfony\Component\Debug\ErrorHandler as BaseErrorHandler;
use Symfony\Component\Debug\Extension\Strategies\BaseStrategy;
use Symfony\Component\Debug\Extension\Strategies\SerialStrategy;
use Symfony\Component\Debug\Extension\Api\ErrorHandlerInterface;
use Symfony\Component\Debug\Extension\Exceptions\ErrorHandlerException;

/**
 * Class ErrorHandler
 * @package Symfony\Component\Debug\Extension
 */
class ErrorHandler extends BaseErrorHandler {

    /**
     * @var BaseStrategy $strategy
     */
    private $strategy;


    /**
     * @return BaseStrategy
     * @throws ErrorHandlerException
     */
    public function getStrategy() {

        if (null === $this->strategy) {
            throw new ErrorHandlerException('Error handler strategy undefined.');
        }

        return $this->strategy;
    }

    /**
     * @param BaseStrategy $strategy
     */
    public function setStrategy(BaseStrategy $strategy) {
        $this->strategy = $strategy;
    }

    /**
     * @param ErrorHandlerInterface $errorHandler
     * @param string $type
     * @return int
     * @throws ErrorHandlerException
     */
    public function registerHandler(ErrorHandlerInterface $errorHandler, $type = '') {
        return $this->getStrategy()->registerHandler($errorHandler, $type);
    }

    /**
     * @param Exception $exception
     * @return bool
     */
    public function handle(Exception $exception) {
        return $this->strategy->handle($exception);
    }

    /**
     * {@inheritdoc}
     */
    public function handleException($exception, array $error = null) {

        $this->handle($exception);

        parent::handleException($exception, $error);
    }

    /**
     * ErrorHandler constructor.
     * @param BaseStrategy|null $strategy
     * {@inheritdoc}
     */
    public function __construct(BaseStrategy $strategy = null, BufferingLogger $bootstrappingLogger = null) {
        parent::__construct($bootstrappingLogger);

        (null !== $strategy) && $this->setStrategy($strategy);
    }


    /**
     * @param ErrorHandler|null $handler
     * @param bool $replace
     * @return ErrorHandler
     */
    public static function registerExtension(ErrorHandler $handler = null, $replace = true) {

        (null === $handler) && $handler = new self(new SerialStrategy());

        /** @var ErrorHandler $handler */
        $handler = BaseErrorHandler::register($handler, $replace);

        return $handler;
    }
}
