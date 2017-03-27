<?php
/**
 *
 * Filename: TagAction.class.php
 *
 * @author liyan
 * @since 2017 3 27
 */
class TagAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $seo_tagname = MRequest::param('seo_tagname');
        $tag = DalTags::getTagBySEOTagname($seo_tagname);
        if (is_null($tag)) {
            print 'illegal tag';
            return;
        }

        $arrQno = DalTagQuestion::getQnosByTid($tag['tid']);
        $questionList = DalQuestion::getMultiQuestions($arrQno);

        if ($is_signin) {
            $arrQno = array_column($questionList, 'qno');
            $uid = $this->me->uid();
            $accepted = DalAccepted::getUserQuestionAccepted($uid, $arrQno);
            $this->assign('accepted', $accepted);
        }

        $this->assign('tag', $tag);
        $this->assign('questionList', $questionList);
        $this->displayTemplate('tag/tag-question.tpl.php');
    }

    protected function topmenu() {
        return 'question';
    }

}
