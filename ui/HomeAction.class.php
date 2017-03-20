<?php
/**
 * Homepage
 *
 * Filename: HomeAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 16
 */
class HomeAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $this->displayTemplate('home.tpl.php');
    }

}
