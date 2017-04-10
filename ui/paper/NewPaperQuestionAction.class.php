<?php
/**
 * Filename: NewPaperQuestionAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 10
 */
class NewPaperQuestionAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {
        $papername = MRequest::post('papername');
        $paperintro = MRequest::post('paperintro');

        $questionList = DalQuestion::getQuestionList();

        $this->assign('papername', $papername);
        $this->assign('paperintro', $paperintro);
        $this->assign('questionList', $questionList);

        $this->displayTemplate('paper/newpaperquestion.tpl.php');
    }

    protected function topmenu() {
        return 'paper';
    }

}
