<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalPaper.class.php
 *
 * @author liyan
 * @since 2017 4 10
 */
class DalPaper extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function addPaper($papername, $paperintro, $papertype, $owner_uid) {
        DAssert::assertNumeric($owner_uid);
        $arrIns = array(
            'papername' => $papername,
            'paperintro' => $paperintro,
            'papertype' => $papertype,
            'owner_uid' => $owner_uid,
            'updatetime' => datetime(),
        );
        return self::doInsert('paper', $arrIns);
    }

}
