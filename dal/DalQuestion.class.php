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
                WHERE qno=$qno AND pub=1";
        return self::rs2rowline($sql);
    }

    public static function getQuestionBySeoTitle($seo_title) {
        self::escape($seo_title);
        $sql = "SELECT *
                FROM questions
                WHERE seo_title='$seo_title'";
        return self::rs2rowline($sql);
    }

    public static function getQuestionList($ps = 0, $pn = 999999) {
        DAssert::assertNumeric($ps, $pn);
        $sql = "SELECT *
                FROM questions
                WHERE pub=1
                ORDER BY qno
                LIMIT $ps, $pn";
        return self::rs2array($sql);
    }

    public static function getRandQuestion() {
        $sql = "SELECT *
                FROM questions
                WHERE pub=1
                ORDER BY RAND()
                LIMIT 1";
        return self::rs2rowline($sql);
    }

    public static function getMultiQuestions($arrQno) {
        DAssert::assertNotEmptyNumericArray($arrQno);
        $qnos = join(',', $arrQno);
        $sql = "SELECT *
                FROM questions
                WHERE qno IN ($qnos)";
        return self::rs2keyarray($sql, 'qno');
    }

}
