<?php
/**
 * Homepage
 *
 * Filename: RunAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 3
 */
class RunAction extends XBaseAction {

    public function execute() {
        $code = MRequest::post('code');
        $qno = MRequest::post('qno');

        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');

        $playground_path = sprintf('%splayground/%d/php/', $coderoot, $qno);
        if (!file_exists($playground_path)) {
            mkdir($playground_path, 0777, true);
        }
        $filename = $playground_path.'solution.php';
        file_put_contents($filename, $code);

        copy(sprintf('%squestions/%d/code/php/test/main.php', $coderoot, $qno),
            $playground_path.'main.php');
        copy(sprintf('%squestions/%d/code/php/test/testcase.php', $coderoot, $qno),
            $playground_path.'testcase.php');

        $cmd = "sudo docker run -v $playground_path:/code --rm php php /code/main.php";
        $output = shell_exec($cmd);
        $result = json_decode($output, true);
        if (is_null($result)) {
            $result = array(
                'result' => 'error',
                'msg' => '编译错误',
                'info' => array(
                    'error' => $output,
                    ),
                );
        }

        $this->displayJsonSuccess($result);
    }

}
