<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\SimpleSigninDelegate;
use Mod\SimpleUser\SimpleSigninCommitDelegate;
use Mod\SimpleUser\SimpleSigninAction;
use Mod\SimpleUser\MSimpleUser;

class SigninDelegate extends LeapPageBaseAction
implements SimpleSigninDelegate, SimpleSigninCommitDelegate {

    protected function pageExecute($is_signin) {

    }

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

    public function signinFailed(Exception $e) {
        $this->assign('notice', $e->getMessage());
        $this->assign('links', ['/signin' => '重新登录']);
        $this->displayTemplate('misc/notice.tpl.php');
    }

}