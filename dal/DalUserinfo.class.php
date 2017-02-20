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

}
