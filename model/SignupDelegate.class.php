<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\SimpleSignupDelegate;
use Mod\SimpleUser\SimpleSignupCommitDelegate;
use Mod\SimpleUser\SimpleSignupAction;
use Mod\SimpleUser\MSimpleUser;

class SignupDelegate extends NoticeBaseAction
implements SimpleSignupDelegate, SimpleSignupCommitDelegate {

    public function shouldSignup(&$username, &$password) {
        $nickname = MRequest::post('nickname');
        if (empty($username) or empty($password) or empty($nickname)) {
            $this->displayNotice('注册信息填写不完整，请重新注册！',
                ['/signup' => '重新注册']);
            return false;
        }

        $userinfo = DalUserinfo::getUserinfoByNickname($nickname);
        if (!is_null($userinfo)) {
            $this->displayNotice('该昵称已被占用，请换一个昵称！',
                ['/signup' => '重新注册']);
            return false;
        }
        $username = MRequest::post('email');
    }

    public function didSignup(MSimpleUser $simpleUser) {
        $nickname = MRequest::post('nickname');
        $uid = $simpleUser->uid();
        DalUserinfo::addUserinfo($uid, $nickname);
    }

    public function template() {
        return TEMPLATE.'sign/signup.tpl.php';
    }

    public function beforeDisplay(SimpleSignupAction $action) {
        $action->assign('topmenu', '');
    }

    public function userAlreadyExists($username) {
        $this->displayNotice('该邮箱已被注册，请使用其他邮箱注册，或直接登录！',
            ['/signup' => '重新注册', '/signin' => '立即登录']);
    }

}
