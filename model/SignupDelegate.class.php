<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\SimpleSignupDelegate;
use Mod\SimpleUser\SimpleSignupCommitDelegate;
use Mod\SimpleUser\SimpleSignupAction;
use Mod\SimpleUser\MSimpleUser;

class SignupDelegate
implements SimpleSignupDelegate, SimpleSignupCommitDelegate {

    public function willSignup(&$username, &$password) {
        $username = MRequest::post('email');
    }

    public function didSignup(MSimpleUser $simpleUser) {
        # code...
    }

    public function template() {
        return TEMPLATE.'sign/signup.tpl.php';
    }

    public function beforeDisplay(SimpleSignupAction $action) {
        $action->assign('topmenu', '');
    }

}