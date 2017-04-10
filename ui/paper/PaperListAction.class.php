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
        $recommend_papers = LibPaper::getRecommends();
        $this->assign('recommend_papers', $recommend_papers);
        $this->displayTemplate('paper/paperlist.tpl.php');
    }

    protected function topmenu() {
        return 'paper';
    }

}
