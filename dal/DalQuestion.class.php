<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalQuestion.class.php
 *
 * @author liyan
 * @since 2017 1 17
 */
class DalQuestion extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getQuestion($qno) {
        DAssert::assertNumeric($qno);
        $sql = "SELECT *
                FROM questions
                WHERE qno=$qno";
        return self::rs2rowline($sql);
    }

    public static function getQuestionList($ps = 0, $pn = 999999) {
        DAssert::assertNumeric($ps, $pn);
        $sql = "SELECT *
                FROM questions
                ORDER BY qno
                LIMIT $ps, $pn";
        return self::rs2array($sql);
    }

}
