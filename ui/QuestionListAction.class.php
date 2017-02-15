<?php
/**
 * Homepage
 *
 * Filename: QuestionListAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 20
 */
class QuestionListAction extends SigninBaseAction {

    protected function pageExecute($is_signin) {
        $questionList = DalQuestion::getQuestionList();

        if ($is_signin) {
            $arrQno = array_column($questionList, 'qno');
            $accepted = DalAccepted::getUserAccepted($arrQno);
            $this->assign('accepted', $accepted);
        }

        $this->assign('questionList', $questionList);
        $this->displayTemplate('questionlist.tpl.php');
    }

}
