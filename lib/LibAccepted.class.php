<?php
/**
 * @author liyan
 * @since 2017 2 27
 */
class LibAccepted {

    public static function setAcceptedCode($uid, $qno, $lang, $code) {
        DalAccepted::beginTransaction();
        try {
            $accepted = DalAccepted::getAccepted($uid, $qno, $lang);
            if (is_null($accepted)) {
                DalAccepted::insertAccepted($uid, $qno, $lang);
                $id = DalAccepted::insertID();
            } else {
                $id = $accepted['id'];
                DalAccepted::updateAccepted($id);
            }
            DalAcceptedCode::setCode($id, $code);
        } catch (Exception $e) {
            return DalAccepted::rollback();
        }
        return DalAccepted::commit();
    }

    public static function getUserLatestAccepted($uid, $num = 10) {
        $latestAccepted = DalAccepted::getUserLatestAccepted($uid, $num);

        if (!empty($latestAccepted)) {
            $arrQno = array_keys($latestAccepted);
            $lang_map = DalAccepted::getUserAcceptedLangs($uid, $arrQno);
            foreach ($latestAccepted as &$accepted) {
                $qno = $accepted['qno'];
                $accepted['lang'] = array_column($lang_map[$qno], 'lang');
            }
            unset($accepted);
        }

        return $latestAccepted;
    }

}
