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
        $this->assign('notice', $notice);
        $this->assign('links', $links);
        $this->displayTemplate('misc/notice.tpl.php');
    }

}
