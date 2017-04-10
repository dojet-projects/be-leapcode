<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalPaperRecommend.class.php
 *
 * @author liyan
 * @since 2017 4 10
 */
class DalPaperRecommend extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getRecommendPids($ps = 0, $pn = 10) {
        DAssert::assertNumeric($ps, $pn);
        $sql = "SELECT pid
                FROM paper_recommend
                ORDER BY updatetime
                LIMIT $ps, $pn";
        return self::rs2oneColumnArray($sql);
    }

}
