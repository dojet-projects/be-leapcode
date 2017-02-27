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
                DalAccepted::setAccepted($uid, $qno, $lang);
                $id = DalAccepted::insertID();
            } else {
                $id = $accepted['id'];
            }
            DalAcceptedCode::setCode($id, $code);
        } catch (Exception $e) {
            return DalAccepted::rollback();
        }
        return DalAccepted::commit();
    }

}
