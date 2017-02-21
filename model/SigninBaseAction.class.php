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

    protected function templatePrefix($template) {
        return TEMPLATE;
    }

    final protected function simpleUserSigninExecute(MSimpleUser $me) {
        $me = MLeapUser::user($me);
        return $this->signinExecute($me);
    }

    abstract protected function signinExecute(MLeapUser $me);

}
