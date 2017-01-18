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
use Mod\SimpleUser\MSimpleUser;

abstract class SigninBaseAction extends SimpleUserSigninBaseAction {

    protected $me = null;

    protected function templatePrefix($template) {
        return TEMPLATE;
    }

    final protected function signinExecute(MSimpleUser $me) {
        $this->me = $me;
        return $this->pageExecute(true);
    }

    final protected function notSignin() {
        return $this->pageExecute(false);
    }

    abstract protected function pageExecute($is_signin);

}
