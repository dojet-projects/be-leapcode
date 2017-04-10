<?php
/**
 * Filename: NewPaperCommitAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 10
 */
class NewPaperCommitAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $papername = MRequest::post('papername');
        $paperintro = MRequest::post('paperintro');
        $qnos = MRequest::post('qnos');

        LibPaper::addPaper($papername, $paperintro, $me->uid(), $qnos);
    }

}
