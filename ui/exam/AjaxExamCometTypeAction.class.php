<?php
/**
 * Homepage
 *
 * Filename: AjaxExamCometTypeAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 12
 */
class AjaxExamCometTypeAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $ck = MRequest::post('ck');
        $this->displayJsonSuccess();
    }

}
