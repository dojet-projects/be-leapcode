<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalTagQuestion.class.php
 *
 * @author liyan
 * @since 2017 3 27
 */
class DalTagQuestion extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getTagQuestions($tid, $ps = 0, $pn = 999) {
        DAssert::assertNumeric($tid, $ps, $pn);
        $sql = "SELECT *
                FROM question_tag
                WHERE tid=$tid
                ORDER BY updatetime DESC
                LIMIT $ps, $pn";
        return self::rs2array($sql);
    }

    public static function getQnosByTid($tid, $ps = 0, $pn = 999) {
        DAssert::assertNumeric($tid, $ps, $pn);
        $sql = "SELECT qno
                FROM question_tag
                WHERE tid=$tid
                ORDER BY updatetime DESC
                LIMIT $ps, $pn";
        return self::rs2oneColumnArray($sql);
    }

    public static function getQuestionTids($qno) {
        DAssert::assertNumeric($qno);
        $sql = "SELECT tid
                FROM question_tag
                WHERE qno=$qno";
        return self::rs2oneColumnArray($sql);
    }

}
