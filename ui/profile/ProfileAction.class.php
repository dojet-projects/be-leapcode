<?php
/**
 * Filename: ProfileAction.class.php
 *
 * @author liyan
 * @since 2017 2 20
 */
class ProfileAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {

        $this->displayTemplate('profile/profile.tpl.php');
    }
}
