<?php
/**
 * Homepage
 *
 * Filename: PaperListAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 9
 */
class PaperListAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $this->displayTemplate('paper/paperlist.tpl.php');
    }

    protected function topmenu() {
        return 'paper';
    }

}
