<?php
/**
 * Homepage
 *
 * Filename: HomeAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 16
 */
class HomeAction extends XBaseAction {

    public function execute() {
        $this->displayTemplate('home.tpl.php');
    }

}
