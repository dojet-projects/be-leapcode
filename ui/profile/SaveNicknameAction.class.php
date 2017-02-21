<?php
/**
 * Filename: SaveNicknameAction.class.php
 *
 * @author liyan
 * @since 2017 2 21
 */
class SaveNicknameAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {

        $this->displayTemplate('profile/profile.tpl.php');
    }

}
