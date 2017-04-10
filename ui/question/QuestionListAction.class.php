<?php
/**
 * Homepage
 *
 * Filename: QuestionListAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 20
 */
class QuestionListAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $questionList = DalQuestion::getQuestionList();

        if ($is_signin) {
            $arrQno = array_column($questionList, 'qno');
            $uid = $this->me->uid();
            $accepted = DalAccepted::getUserQuestionAccepted($uid, $arrQno);
            $this->assign('accepted', $accepted);
        }

        $tags = DalTags::getAllTags();

        $this->assign('questionList', $questionList);
        $this->assign('tags', $tags);
        $this->displayTemplate('question/questionlist.tpl.php');
    }

    protected function topmenu() {
        return 'question';
    }

}
