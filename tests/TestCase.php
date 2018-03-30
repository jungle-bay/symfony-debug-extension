<?php
/**
 * Created by PhpStorm.
 * User: roma_bb8
 * Date: 30.03.18
 * Time: 11:47
 */

namespace Symfony\Component\Debug\Extension\Tests;


use \PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Symfony\Component\Debug\Extension\Tests
 */
class TestCase extends BaseTestCase {

    /**
     * @return string
     */
    public static function getRootFolder() {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $file
     */
    public function assertHandleException($file) {

        if (false === file_exists($file)) {
            $this->assertTrue(false);
            return;
        }

        $this->assertTrue(true);
        unlink($file);
    }
}
