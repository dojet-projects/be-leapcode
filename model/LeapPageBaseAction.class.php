<?php
/**
 * description
 *
 * Filename: LeapPageBaseAction.class.php
 *
 * @author liyan
 * @since 2017 2 21
 */
abstract class LeapPageBaseAction extends SigninPageBaseAction {

    protected $me;

    final protected function signinPageExecute(MLeapUser $me) {
        $this->me = $me;
        return $this->pageExecute(true);
    }

    final protected function notSignin() {
        // redirect('/you-should-be-invited');
        return $this->pageExecute(false);
    }

    abstract protected function pageExecute($is_signin);

}
