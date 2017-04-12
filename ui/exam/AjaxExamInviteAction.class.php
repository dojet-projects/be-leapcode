<?php
/**
 * Homepage
 *
 * Filename: AjaxExamInviteAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 12
 */
use \Mod\SimpleUser\DalSimpleUser;

class AjaxExamInviteAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $invite_to = MRequest::post('invite_to');
        $qno = MRequest::post('qno');

        $question = DalQuestion::getQuestion($qno);
        if (is_null($question)) {
            return $this->displayJsonFail('问题不存在');
        }

        DalExamInviteRequest::setRequest($me->uid(), $invite_to, $qno);

        $ret = $this->sendInvite($me, $invite_to, $qno);

        $this->displayJsonSuccess();
    }

    protected function sendInvite(MLeapUser $me, $invite_to, $qno) {
        $simpleUser = DalSimpleUser::getUserByUsername($invite_to);
        if (is_null($simpleUser)) {
            return false;
        }

        DalExamInvite::setInvite($me->uid(), $simpleUser['uid'], $qno);
    }

}
