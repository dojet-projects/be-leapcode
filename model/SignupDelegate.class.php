<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\SimpleSignupDelegate;
use Mod\SimpleUser\SimpleSignupCommitDelegate;
use Mod\SimpleUser\SimpleSignupAction;
use Mod\SimpleUser\MSimpleUser;

class SignupDelegate extends LeapPageBaseAction
implements SimpleSignupDelegate, SimpleSignupCommitDelegate {

    protected function pageExecute($is_signin) {
        ## do nothing
    }

    public function shouldSignup(&$username, &$password) {
        $nickname = MRequest::post('nickname');
        if (empty($username) or empty($password) or empty($nickname)) {
            $this->assign('notice', '注册信息填写不完整，请重新注册！');
            $this->assign('links', ['/signup' => '重新注册']);
            $this->displayTemplate('misc/notice.tpl.php');
            return false;
        }

        $userinfo = DalUserinfo::getUserinfoByNickname($nickname);
        if (!is_null($userinfo)) {
            $this->assign('notice', '该昵称已被占用，请换一个昵称！');
            $this->assign('links', ['/signup' => '重新注册']);
            $this->displayTemplate('misc/notice.tpl.php');
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
        $this->assign('notice', '该邮箱已被注册，请使用其他邮箱注册，或直接登录！');
        $this->assign('links', ['/signup' => '重新注册', '/signin' => '立即登录']);
        $this->displayTemplate('misc/notice.tpl.php');
    }

}
