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
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->displayNotice('输入的邮箱格式不正确！',
                ['/signin' => '重新登录']);
            return false;
        }

        if (empty($email) or empty($password)) {
            $this->displayNotice('登录邮箱和密码不能为空！', ['/signin' => '重新登录']);
            return false;
        }

        $username = $email;
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
        $this->displayNotice($e->getMessage(), ['/signin' => '重新登录']);
    }

}