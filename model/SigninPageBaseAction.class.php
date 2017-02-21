<?php
/**
 * description
 *
 * Filename: SigninPageBaseAction.class.php
 *
 * @author liyan
 * @since 2017 2 21
 */
abstract class SigninPageBaseAction extends SigninBaseAction {

    protected function templatePrefix($template) {
        return TEMPLATE;
    }

    protected function topmenu() {
        return 'question';
    }

    final protected function signinExecute(MLeapUser $me) {
        $this->assign('topmenu', $this->topmenu());
        $this->assign('show_sign', true);
        return $this->signinPageExecute($me);
    }

    abstract protected function signinPageExecute(MLeapUser $me);

}
