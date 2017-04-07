<?php
/**
 *
 * Filename: InviteCommitAction.class.php
 *
 * @author liyan
 * @since 2017 4 6
 */
class InviteCommitAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {
        redirect('/');
    }

    protected function notSignin() {
        $invitecode = MRequest::post('invitecode');
        MCookie::setCookie('invitecode', $invitecode, null, '/');
        redirect('/signup');
    }

}
