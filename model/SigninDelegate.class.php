<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\SimpleSigninDelegate;
use Mod\SimpleUser\SimpleSigninCommitDelegate;
use Mod\SimpleUser\SimpleSigninAction;
use Mod\SimpleUser\MSimpleUser;

class SigninDelegate
implements SimpleSigninDelegate, SimpleSigninCommitDelegate {

    public function willSignin($username, $password) {

    }

    public function didSignin(MSimpleUser $simpleUser) {

    }

    public function template() {
        return TEMPLATE.'sign/signin.tpl.php';
    }

    public function beforeDisplay(SimpleSigninAction $action) {
        $action->assign('topmenu', '');
    }

}