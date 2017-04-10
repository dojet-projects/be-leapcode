<?php
/**
 * @author liyan
 * @since 2017 4 10
 */
class LibPaper {

    public static function addPaper($papername, $paperintro, $owner_uid, $qnos) {
        DalPaper::beginTransaction();

        DalPaper::addPaper($papername, $paperintro, $owner_uid);
        $pid = DalPaper::insertID();

        DalPaperQuestion::deletePaperQnos($pid);

        $arrQnos = explode(',', $qnos);
        DAssert::assertNumericArray($arrQnos);
        foreach ($arrQnos as $orderno => $qno) {
            DalPaperQuestion::addPaperQno($pid, $qno, $orderno);
        }

        DalPaper::commit();
    }

}
