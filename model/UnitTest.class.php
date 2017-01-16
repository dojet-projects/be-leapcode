<?php
/**
 * @author liyan
 * @since 2017 1 16
 */
abstract class UnitTest {

    protected static $testResult = array();

    abstract public function test();

    abstract protected function doTest($input, $expect);

    public function result() {
        return self::$testResult;
    }

    protected function testFail($input, $output, $expect) {
        self::$testResult['fail'][] = array(
            'input' => json_encode($input),
            'output' => json_encode($output),
            'expect' => json_encode($expect),
            );
    }

    protected function testSuccess($input, $output, $expect) {
        self::$testResult['success'][] = array(
            'input' => json_encode($input),
            'output' => json_encode($output),
            'expect' => json_encode($expect),
            );
    }

    protected function assertArray($ret, $array) {
        return $ret == $array;
    }

    protected function assertArrayStrict($ret, $array) {
        return $ret === $array;
    }

}