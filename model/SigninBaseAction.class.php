<?php
/**
 * description
 *
 * Filename: AbstractSimpleUserBaseAction.class.php
 *
 * @author liyan
 * @since 2017 1 17
 */
use Mod\SimpleUser\SimpleUserSigninBaseAction;

abstract class SigninBaseAction extends SimpleUserSigninBaseAction {

    abstract protected function signinExecute(MSimpleUser $me);

    protected function notSignin() {
        redirect('/signin');
    }

}
