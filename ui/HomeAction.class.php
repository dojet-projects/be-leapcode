<?php
/**
 * Homepage
 *
 * Filename: HomeAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 16
 */
class HomeAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {
        $this->pageExecute();
    }

    protected function notSignin() {
        $this->pageExecute();
    }

    protected function pageExecute() {
        $this->displayTemplate('home.tpl.php');
    }

}
