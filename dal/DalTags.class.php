<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalTags.class.php
 *
 * @author liyan
 * @since 2017 3 27
 */
class DalTags extends MysqlDal {

    protected static function defaultDB() {
        return DBLEAPCODE;
    }

    public static function getAllTags($ps = 0, $pn =100) {
        DAssert::assertNumeric($ps, $pn);
        $sql = "SELECT *
                FROM tags
                LIMIT $ps, $pn";
        return self::rs2array($sql);
    }

    public static function getTagBySEOTagname($seo_tagname) {
        self::escape($seo_tagname);
        $sql = "SELECT *
                FROM tags
                WHERE seo_tagname=\"$seo_tagname\"";
        return self::rs2rowline($sql);
    }

    public static function getMultiTags($arrTid) {
        $wherein = self::wherein('tid', $arrTid);
        $sql = "SELECT *
                FROM tags
                WHERE $wherein";
        return self::rs2array($sql);
    }

}
