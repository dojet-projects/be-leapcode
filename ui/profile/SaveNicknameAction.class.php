<?php
/**
 * Filename: SaveNicknameAction.class.php
 *
 * @author liyan
 * @since 2017 2 21
 */
class SaveNicknameAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $nickname = MRequest::post('nickname');

        DalUserinfo::updateNickname($me->uid(), $nickname);

        redirect('/profile');
    }

}
