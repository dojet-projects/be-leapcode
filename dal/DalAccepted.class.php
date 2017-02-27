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

    public static function getUserAccepted($uid, $arrQno) {
        DAssert::assertNumeric($uid);
        DAssert::assertNotEmptyNumericArray($arrQno);
        $wherein = join(',', $arrQno);
        $sql = "SELECT *
                FROM accepted
                WHERE uid=$uid AND qno IN ($wherein)";
        return self::rs2keyarray($sql, 'qno');
    }

    public static function setAccepted($uid, $qno, $lang) {
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
        $arrUpd = array(
            'updatetime' => datetime(),
        );
        return self::doInsertUpdate('accepted', $arrIns, $arrUpd);
    }

}
