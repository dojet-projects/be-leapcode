<?php
/**
 * description
 *
 * Filename: LeapBaseAction.class.php
 *
 * @author liyan
 * @since 2017 1 17
 */
abstract class LeapBaseAction extends SigninBaseAction {

    protected $me = null;

    protected function templatePrefix($template) {
        return TEMPLATE;
    }

    protected function topmenu() {
        return 'question';
    }

    function __construct() {
        parent::__construct();
        $this->assign('topmenu', $this->topmenu());
        $this->assign('show_sign', true);
    }

    final protected function signinExecute(MLeapUser $me) {
        $this->me = $me;
        $this->assign('me', $me);
        return $this->pageExecute(true);
    }

    final protected function notSignin() {
        return $this->pageExecute(false);
    }

    abstract protected function pageExecute($is_signin);

}
