<?php
/**
 * Homepage
 *
 * Filename: HomeAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 16
 */
class HomeAction extends SigninBaseAction {

    protected function pageExecute($is_signin) {
        $this->displayTemplate('home.tpl.php');
    }

}