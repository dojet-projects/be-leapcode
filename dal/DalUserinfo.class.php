<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalUserinfo.class.php
 *
 * @author liyan
 * @since 2017 2 20
 */
class DalUserinfo extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getUserinfoByUID($uid) {
        DAssert::assertNumeric($uid);
        $sql = "SELECT *
                FROM user_info
                WHERE uid=$uid";
        return self::rs2rowline($sql);
    }

    public static function getUserinfoByNickname($nickname) {
        self::escape($nickname);
        $sql = "SELECT *
                FROM user_info
                WHERE nickname=\"$nickname\"";
        return self::rs2rowline($sql);
    }

    public static function addUserinfo($uid, $nickname) {
        $arrIns = array(
            'uid' => $uid,
            'nickname' => $nickname,
        );
        return self::doInsert('user_info', $arrIns);
    }

    public static function updateNickname($uid, $nickname) {
        DAssert::assertNumeric($uid);
        $arrUpd = array(
            'nickname' => $nickname,
        );
        $where = "uid=$uid";
        return self::doUpdate('user_info', $arrUpd, $where, 1);
    }

    public static function updatePersonalInfo($uid, $realname, $occupation, $aboutme) {
        DAssert::assertNumeric($uid);
        $arrUpd = array(
            'realname' => $realname,
            'occupation' => $occupation,
            'aboutme' => $aboutme,
        );
        $where = "uid=$uid";
        return self::doUpdate('user_info', $arrUpd, $where, 1);
    }

}
