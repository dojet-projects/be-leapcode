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

}
