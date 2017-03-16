<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalAccepted.class.php
 *
 * @author liyan
 * @since 2017 2 15
 */
class DalAccepted extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getAccepted($uid, $qno, $lang) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        self::escape($lang);
        $sql = "SELECT *
                FROM accepted
                WHERE qno=$qno AND uid=$uid AND lang=\"$lang\"";
        return self::rs2rowline($sql);
    }

    public static function getUserQuestionAccepted($uid, $arrQno) {
        DAssert::assertNumeric($uid);
        DAssert::assertNotEmptyNumericArray($arrQno);
        $wherein = join(',', $arrQno);
        $sql = "SELECT *
                FROM accepted
                WHERE uid=$uid AND qno IN ($wherein)";
        return self::rs2keyarray($sql, 'qno');
    }

    public static function getUserLatestAccepted($uid, $num = 10) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($num);
        $sql = "SELECT *
                FROM accepted
                WHERE uid=$uid
                GROUP BY qno
                ORDER BY updatetime
                LIMIT $num";
        return self::rs2keyarray($sql, 'qno');
    }

    public static function getUserAcceptedLangs($uid, $arrQno) {
        DAssert::assertNumeric($uid);
        DAssert::assertNotEmptyNumericArray($arrQno);
        $wherein = join(',', $arrQno);
        $sql = "SELECT qno, lang
                FROM accepted
                WHERE uid=$uid AND qno IN ($wherein)";
        return self::rs2grouparray($sql, 'qno');
    }

    public static function insertAccepted($uid, $qno, $lang) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        self::escape($lang);
        $arrIns = array(
            'uid' => $uid,
            'qno' => $qno,
            'lang' => $lang,
            'createtime' => datetime(),
            'updatetime' => datetime(),
        );
        return self::doInsert('accepted', $arrIns);
    }

    public static function updateAccepted($id) {
        DAssert::assertNumeric($id);
        $arrUpd = array(
            'updatetime' => datetime(),
        );
        $where = "id=$id";
        return self::doUpdate('accepted', $arrUpd, $where, 1);
    }

}
