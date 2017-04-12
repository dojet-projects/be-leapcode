<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalExamInvite.class.php
 *
 * @author liyan
 * @since 2017 4 12
 */
class DalExamInvite extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getInvite($eid) {
        DAssert::assertNumeric($eid);
        $sql = "SELECT *
                FROM exam_invite
                WHERE eid=$eid";
        return self::rs2rowline($sql);
    }

    public static function setInvite($uid, $invited_uid, $qno) {
        DAssert::assertNumeric($uid, $invited_uid, $qno);
        $arrIns = array(
            'uid' => $uid,
            'invited_uid' => $invited_uid,
            'qno' => $qno,
            'updatetime' => datetime(),
        );
        $arrUpd = array(
            'updatetime' => datetime(),
        );
        return self::doInsertUpdate('exam_invite', $arrIns, $arrUpd);
    }

}
