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

    public static function getAccepted($uid, $qno) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        $sql = "SELECT *
                FROM accepted
                WHERE qno=$qno AND uid=$uid";
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

    public static function setAccepted($uid, $qno) {
        DAssert::assertNumeric($uid);
        DAssert::assertNumeric($qno);
        $arrIns = array(
            'uid' => $uid,
            'qno' => $qno,
            'createtime' => datetime(),
            'updatetime' => datetime(),
        );
        $arrUpd = array(
            'updatetime' => datetime(),
        );
        return self::doInsertUpdate('accepted', $arrIns, $arrUpd);
    }

}
