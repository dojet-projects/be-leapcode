<?php
/**
 * description
 *
 * Filename: NoticeBaseAction.class.php
 *
 * @author liyan
 * @since 2017 3 21
 */
abstract class NoticeBaseAction extends LeapPageBaseAction {

    final protected function pageExecute($is_signin) {

    }

    protected function displayNotice($notice, $links) {
        $this->assign('notice', '注册信息填写不完整，请重新注册！');
        $this->assign('links', ['/signup' => '重新注册']);
        $this->displayTemplate('misc/notice.tpl.php');
    }

}
