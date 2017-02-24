<?php
/**
 * Filename: SavePersonalInfoAction.class.php
 *
 * @author liyan
 * @since 2017 2 21
 */
class SavePersonalInfoAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $realname = MRequest::post('realname');
        $occupation = MRequest::post('occupation');
        $aboutme = MRequest::post('aboutme');

        DalUserinfo::updatePersonalInfo($me->uid(), $realname, $occupation, $aboutme);

        redirect('/account');
    }

}
