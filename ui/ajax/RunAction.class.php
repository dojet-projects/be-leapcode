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

        $path = Config::runtimeConfigForKeyPath('global.coderoot');
        $filename = $path.'code.php';
        file_put_contents($filename, $code);

        $cmd = "sudo docker run -v $path:/phpfile --rm php php /phpfile/code.php";
        $output = shell_exec($cmd);

        $this->displayJsonSuccess(array('output' => $output));
    }

}
