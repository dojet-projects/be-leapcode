<?php
/**
 * Filename: ProfileAction.class.php
 *
 * @author liyan
 * @since 2017 2 20
 */
class ProfileAction extends LeapBaseAction {

    protected function pageExecute($is_signin) {
        if (!$is_signin) {
            return;
        }
        $me = $this->me;

        $this->displayTemplate('profile/profile.tpl.php');
    }

}
