<?php
/**
 * @author liyan
 * @since 2017 3 27
 */
class LibTag {

    public static function getQuestionTags($qno) {
        $arrTid = DalTagQuestion::getQuestionTids($qno);
        if (empty($arrTid)) {
            return array();
        }
        return DalTags::getMultiTags($arrTid);
    }

}
