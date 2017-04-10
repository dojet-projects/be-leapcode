<?php
/**
 * Filename: NewPaperAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 10
 */
class NewPaperAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {
        $this->displayTemplate('paper/newpaper.tpl.php');
    }

    protected function topmenu() {
        return 'paper';
    }

}
