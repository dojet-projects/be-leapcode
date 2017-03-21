<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\SimpleSigninDelegate;
use Mod\SimpleUser\SimpleSigninCommitDelegate;
use Mod\SimpleUser\SimpleSigninAction;
use Mod\SimpleUser\MSimpleUser;

class SigninDelegate extends NoticeBaseAction
implements SimpleSigninDelegate, SimpleSigninCommitDelegate {

    public function shouldSignin(&$username, &$password) {
        $email = MRequest::post('email');
        $username = $email;
        if (empty($username) or empty($password)) {
            $this->displayNotice('登录邮箱和密码不能为空！', ['/signup' => '重新注册']);
            return false;
        }
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
        $this->displayNotice($e->getMessage(), ['/signup' => '重新注册']);
    }

}