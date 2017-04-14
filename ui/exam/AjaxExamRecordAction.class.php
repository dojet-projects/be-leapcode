<?php
/**
 * Homepage
 *
 * Filename: AjaxExamRecordAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 12
 */
class AjaxExamRecordAction extends SigninBaseAction {

    protected function signinExecute(MLeapUser $me) {
        $no = MRequest::post('no');
        $ts = MRequest::post('ts');
        $change = MRequest::post('change');
        $eid = MRequest::post('eid');
        $uid = $me->uid();

        $redisKey = sprintf("uid:%s:exam:%s", $uid, $eid);
        DRedis::zAdd($redisKey, $no, $change);

        $this->displayJsonSuccess();
    }

}
