<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalPaperQuestion.class.php
 *
 * @author liyan
 * @since 2017 4 10
 */
class DalPaperQuestion extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getPaperQnos($pid, $ps = 0, $pn = 99999) {
        DAssert::assertNumeric($pid, $ps, $pn);
        $sql = "SELECT qno
                FROM paper_question
                WHERE pid=$pid
                LIMIT $ps, $pn";
        return self::rs2oneColumnArray($sql);
    }

}
