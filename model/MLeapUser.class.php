<?php
/**
 * @author liyan
 * @since 2017 2 20
 */
use Mod\SimpleUser\MSimpleUser;

class MLeapUser {

    protected $simpleUser;
    protected $userinfo;

    function __construct(MSimpleUser $simpleUser) {
        $this->simpleUser = $simpleUser;
    }

    public static function user(MSimpleUser $simpleUser) {
        return new MLeapUser($simpleUser);
    }

    public function simpleUser() {
        return $this->simpleUser;
    }

    public function uid() {
        return $this->simpleUser()->uid();
    }

    protected function userinfo($field) {
        if (!$this->userinfo) {
            $uid = $this->simpleUser->uid();
            $this->userinfo = DalUserinfo::getUserinfoByUID($uid);
        }
        return $this->userinfo[$field];
    }

    public function nickname() {
        return $this->userinfo('nickname');
    }

    public function realname() {
        return $this->userinfo('realname');
    }

    public function occupation() {
        return $this->userinfo('occupation');
    }

    public function aboutme() {
        return $this->userinfo('aboutme');
    }

}
