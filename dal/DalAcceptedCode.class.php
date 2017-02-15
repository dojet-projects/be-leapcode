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
class DalAcceptedCode extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getCode($uid, $qno, $lang) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        self::escape($lang);
        $sql = "SELECT *
                FROM accepted_code
                WHERE qno=$qno AND uid=$uid AND lang=\"$lang\"";
        return self::rs2rowline($sql);
    }

    public static function setCode($uid, $qno, $lang, $code) {
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
        return self::doInsertUpdate('accepted_code', $arrIns, $arrUpd);
    }

}
