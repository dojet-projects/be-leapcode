<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalExamInviteRequest.class.php
 *
 * @author liyan
 * @since 2017 4 12
 */
class DalExamInviteRequest extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function setRequest($uid, $invite_to, $qno) {
        DAssert::assertNumeric($uid, $qno);
        $arrIns = array(
            'uid' => $uid,
            'invite_to' => $invite_to,
            'qno' => $qno,
            'updatetime' => datetime(),
        );
        $arrUpd = array(
            'updatetime' => datetime(),
        );
        return self::doInsertUpdate('exam_invite_request', $arrIns, $arrUpd);
    }

}
