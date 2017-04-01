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

        $uid = $me->uid();

        //  save code
        DalSolution::setSolution($uid, $qno, $lang, $code);

        $manifest = $this->getManifest($qno, $lang);

        $output = '';
        if ('php' === $lang) {
            $output = $this->run_php($code, $qno, $uid, $manifest);
        } elseif ('java' === $lang) {
            $output = $this->run_java($code, $qno, $uid, $manifest);
        }

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

    protected function getManifest($qno, $lang) {
        $manifest = array();
        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');
        $manifest_file = sprintf('%squestions/codes/%d/code/java/manifest', $coderoot, $qno);
        if (file_exists($manifest_file)) {
            $content = file_get_contents($manifest_file);
            $json = json_decode($content, true);
            if (is_array($json)) {
                $manifest = $json;
            }
        }
        return $manifest;
    }

    protected function playground_path($qno, $uid, $lang) {
        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');
        $md5uid = md5(serialize([uniqid(), $uid, microtime()]));
        $playground_path = sprintf('%splayground/%s/%s/%d/%s/%s/%s/',
            $coderoot, date("ym"), date("d"), $qno, $lang,
            substr($md5uid, 0, 2), substr($md5uid, 2));
        if (!file_exists($playground_path)) {
            mkdir($playground_path, 0777, true);
        }
        return $playground_path;
    }

    protected function run_java($code, $qno, $uid, $manifest) {
        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');
        $playground_path = $this->playground_path($qno, $uid, 'java');
        if (!file_exists($playground_path.'src')) {
            mkdir($playground_path.'src/leapcode', 0777, true);
        }

        if (!file_exists($playground_path.'bin')) {
            mkdir($playground_path.'bin', 0777, true);
        }

        // 写入solution文件
        $solution_name = Config::configForKeyPath('java.solution', $manifest, 'Solution.java');
        $filename = sprintf('%ssrc/leapcode/%s', $playground_path, $solution_name);
        $code = sprintf("package leapcode;\r\n%s", $code);
        file_put_contents($filename, $code);

        copy(sprintf('%squestions/codes/%d/code/java/Main.java', $coderoot, $qno),
            $playground_path.'src/Main.java');
        copy(sprintf('%squestions/codes/%d/code/java/run.sh', $coderoot, $qno),
            $playground_path.'run.sh');
        chmod($playground_path.'run.sh', 0755);
        copyr(sprintf('%squestions/codes/%d/code/java/testcase', $coderoot, $qno),
            $playground_path.'src/leapcode/testcase');
        copyr(sprintf('%squestions/utils/java', $coderoot),
            $playground_path.'src/leapcode/utils');

        $cmd = "sudo docker run -v $playground_path:/code -t --rm java:leapcode";
        $output = shell_exec($cmd);

        return $output;
    }

    protected function run_php($code, $qno, $uid, $manifest) {
        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');
        $playground_path = $this->playground_path($qno, $uid, 'php');

        // 写入solution文件
        $solution_name = Config::configForKeyPath('php.solution', $manifest, 'solution.php');
        $filename = sprintf('%s%s', $playground_path, $solution_name);
        file_put_contents($filename, $code);

        copy(sprintf('%squestions/codes/%d/code/php/test/main.php', $coderoot, $qno),
            $playground_path.'main.php');
        copyr(sprintf('%squestions/codes/%d/code/php/test/testcase', $coderoot, $qno),
            $playground_path.'testcase');
        copyr(sprintf('%squestions/utils/php', $coderoot),
            $playground_path.'/utils');

        $cmd = "sudo docker run -v $playground_path:/code --rm php:leapcode";
        $output = shell_exec($cmd);

        return $output;
    }

}
