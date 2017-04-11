<?php
/**
 * Filename: PaperAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 11
 */
class PaperAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $pid = MRequest::param('pid');

        $paper = DalPaper::getPaper($pid);
        if (is_null($paper)) {
            echo 'paper not exists';
            return;
        }

        if ('private' === $paper['papertype'] && false === $this->checkPermission($is_signin)) {
            // illegal
            return;
        }

        $arrQnos = DalPaperQuestion::getPaperQnos($pid);
        $paper_questions = DalQuestion::getMultiQuestions($arrQnos);

        $this->assign('paper', $paper);
        $this->assign('paper_questions', $paper_questions);

        $this->displayTemplate('paper/paper.tpl.php');
    }

    protected function checkPermission($is_signin) {
        if (false === $is_signin) {
            return false;
        }
        $me = $this->me;

        // todo: check my permission

        return true;
    }

    protected function topmenu() {
        return 'paper';
    }

}
