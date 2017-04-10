<?php
/**
 * @author liyan
 * @since 2017 4 10
 */
class LibPaper {

    public static function addPaper($papername, $paperintro, $papertype, $owner_uid, $qnos) {
        DalPaper::beginTransaction();

        DalPaper::addPaper($papername, $paperintro, $papertype, $owner_uid);
        $pid = DalPaper::insertID();

        DalPaperQuestion::deletePaperQnos($pid);

        $arrQnos = explode(',', $qnos);
        DAssert::assertNumericArray($arrQnos);
        foreach ($arrQnos as $orderno => $qno) {
            DalPaperQuestion::addPaperQno($pid, $qno, $orderno);
        }

        DalPaper::commit();
    }

    public static function getRecommends($ps = 0, $pn = 10) {
        $arrPids = DalPaperRecommend::getRecommendPids($ps, $pn);
        if (empty($arrPids)) {
            return [];
        }
        $arrPapers = DalPaper::getPaperList($arrPids);
        return $arrPapers;
    }

}
