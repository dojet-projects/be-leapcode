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
class DalAcceptedCode extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getCode($id) {
        DAssert::assertNumeric($id);
        $sql = "SELECT *
                FROM accepted_code
                WHERE id=$id";
        return self::rs2rowline($sql);
    }

    public static function setCode($id, $code) {
        DAssert::assertNumeric($id);
        self::escape($code);
        $arrIns = array(
            'id' => $id,
            'code' => $code,
            'createtime' => datetime(),
            'updatetime' => datetime(),
        );
        $arrUpd = array(
            'code' => $code,
            'updatetime' => datetime(),
        );
        return self::doInsertUpdate('accepted_code', $arrIns, $arrUpd);
    }

}
