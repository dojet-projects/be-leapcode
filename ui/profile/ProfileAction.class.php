<?php
/**
 * Filename: ProfileAction.class.php
 *
 * @author liyan
 * @since 2017 2 24
 */
class ProfileAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $nickname = MRequest::param('nickname');

        //  leap user
        $userinfo = DalUserinfo::getUserinfoByNickname($nickname);
        if (is_null($userinfo)) {
            print 'user not exists';
            return ;
        }
        $leapUser = MLeapUser::userFromUID($userinfo['uid']);

        //  accepted questions
        $this->assign('leapUser', $leapUser);

        $this->displayTemplate('profile/profile.tpl.php');
    }
}
