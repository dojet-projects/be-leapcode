<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalSolution.class.php
 *
 * @author liyan
 * @since 2017 1 19
 */
class DalSolution extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getSolution($uid, $qno, $lang) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        self::escape($lang);
        $sql = "SELECT *
                FROM solution
                WHERE qno=$qno AND uid=$uid AND lang='$lang'";
        return self::rs2rowline($sql);
    }

    public static function getUserLatestSolution($uid, $qno) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        $sql = "SELECT *
                FROM solution
                WHERE qno=$qno AND uid=$uid
                ORDER BY updatetime DESC
                LIMIT 1";
        return self::rs2rowline($sql);
    }

    public static function setSolution($uid, $qno, $lang, $code) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        self::escape($lang);
        self::escape($code);
        $arrIns = array(
            'uid' => $uid,
            'qno' => $qno,
            'lang' => $lang,
            'code' => $code,
            'createtime' => datetime(),
            'updatetime' => datetime(),
        );
        $arrUpd = array(
            'code' => $code,
            'updatetime' => datetime(),
        );
        return self::doInsertUpdate('solution', $arrIns, $arrUpd);
    }

}
