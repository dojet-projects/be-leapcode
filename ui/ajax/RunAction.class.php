<?php
/**
 * Homepage
 *
 * Filename: RunAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 3
 */
class RunAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $code = MRequest::post('code');
        $qno = MRequest::post('qno');
        $lang = MRequest::post('lang');

        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');

        $uid = $me->uid();

        //  save code
        DalSolution::setSolution($uid, $qno, $lang, $code);

        $playground_path = sprintf('%splayground/%d/php/%s/', $coderoot, $qno, md5($uid));
        if (!file_exists($playground_path)) {
            mkdir($playground_path, 0777, true);
        }
        $filename = $playground_path.'solution.php';
        file_put_contents($filename, $code);

        copy(sprintf('%squestions/codes/%d/code/php/test/main.php', $coderoot, $qno),
            $playground_path.'main.php');
        // copy(sprintf('%squestions/codes/%d/code/php/test/testcase.php', $coderoot, $qno),
        //     $playground_path.'testcase.php');
        copyr(sprintf('%squestions/codes/%d/code/php/test/testcase', $coderoot, $qno),
            $playground_path.'testcase');
        copyr(sprintf('%squestions/utils/php', $coderoot),
            $playground_path.'/utils');

        $cmd = "sudo docker run -v $playground_path:/code --rm php php /code/main.php";
        $output = shell_exec($cmd);
        $result = json_decode($output, true);
        if (is_null($result)) {
            $result = array(
                'result' => 'error',
                'msg' => '编译错误',
                'error' => $output,
                );
        } elseif ($result['result'] === 'success') {
            LibAccepted::setAcceptedCode($uid, $qno, $lang, $code);
        }

        $this->displayJsonSuccess($result);
    }

}
