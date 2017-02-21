<?php
/**
 * description
 *
 * Filename: SigninBaseAction.class.php
 *
 * @author liyan
 * @since 2017 2 21
 */
use Mod\SimpleUser\SimpleUserSigninBaseAction;
use Mod\SimpleUser\MSimpleUser;

abstract class SigninBaseAction extends SimpleUserSigninBaseAction {

    final protected function simpleUserSigninExecute(MSimpleUser $simpleUser) {
        $me = MLeapUser::user($simpleUser);
        $this->assign('me', $me);
        return $this->signinExecute($me);
    }

    abstract protected function signinExecute(MLeapUser $me);

}
