<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalUserQuestion.class.php
 *
 * @author liyan
 * @since 2017 1 19
 */
class DalUserQuestion extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getUserQuestion($uid, $qno, $lang) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        self::escape($lang);
        $sql = "SELECT *
                FROM user_question
                WHERE qno=$qno AND uid=$uid AND lang='$lang'";
        return self::rs2rowline($sql);
    }

    public static function setUserQuestion($uid, $qno, $lang, $code) {
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
        return self::doInsertUpdate('user_question', $arrIns, $arrUpd);
    }

}
