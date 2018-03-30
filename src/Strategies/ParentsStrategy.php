<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 18.03.18
 * Time: 23:02
 */

namespace Symfony\Component\Debug\Extension\Strategies;


use Exception;

/**
 * Class ParentsStrategy
 * @package Symfony\Component\Debug\Extension\Strategies
 */
class ParentsStrategy extends SimpleStrategy {

    /**
     * @param Exception $exception
     * @return array
     */
    protected function identifyParentsTypes(Exception $exception) {

        $parents = class_parents($exception);

        if (false === $parents) {
            return array();
        }

        $parents = array_keys($parents);

        if (null === $parents) {
            return array();
        }

        return array_reverse($parents);
    }


    /**
     * {@inheritdoc}
     */
    public function handle(Exception $exception) {

        $type = $this->identifyExceptionType($exception);
        $parents = $this->identifyParentsTypes($exception);

        foreach ($parents as $parent) {

            $isProcessed = $this->run($parent, $exception);

            if (true === $isProcessed) {
                break;
            }
        }

        return $this->run($type, $exception);
    }
}
