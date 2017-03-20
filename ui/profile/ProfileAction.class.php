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
        $uid = $userinfo['uid'];
        $leapUser = MLeapUser::userFromUID($uid);

        //  accepted questions
        $latestAccepted = LibAccepted::getUserLatestAccepted($uid, 10);
        if (is_null($latestAccepted)) {
            $latestAccepted = array();
        }
        $arrQno = array_column($latestAccepted, 'qno');
        $questions = array();
        if (!empty($arrQno)) {
            $questions = DalQuestion::getMultiQuestions($arrQno);
        }

        $this->assign('leapUser', $leapUser);
        $this->assign('latestAccepted', $latestAccepted);
        $this->assign('questions', $questions);

        $this->displayTemplate('profile/profile.tpl.php');
    }

}
