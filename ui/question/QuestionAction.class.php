<?php
/**
 * Homepage
 *
 * Filename: QuestionAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 3
 */
require UTIL.'Michelf/Markdown.inc.php';
use \Michelf\Markdown;

class QuestionAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $seo_title = MRequest::param('title');
        $question = DalQuestion::getQuestionBySeoTitle($seo_title);

        if (is_null($question)) {
            print 'unknow question';
            return;
        }

        $qno = $question['qno'];

        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');

        //  brief
        $path = sprintf("%squestions/codes/%d/brief.md", $coderoot, $qno);
        $md = file_get_contents($path);
        $brief = Markdown::defaultTransform($md);

        //  code
        $dh = opendir(sprintf("%squestions/codes/%d/code/", $coderoot, $qno));
        DAssert::assert($dh, 'read path error!');
        $lang_list = array();
        while (false !== ($file = readdir($dh))) {
            if (in_array($file, array('.', '..'))) {
                continue;
            }
            $lang_list[] = $file;
        }

        //  solution code
        $code = null;
        if ($is_signin) {
            $uid = $this->me->simpleUser()->uid();
            $solution = DalSolution::getUserLatestSolution($uid, $qno);
            $lang = $solution['lang'];
            $code = $solution['code'];
        }
        if (is_null($code)) {
            $lang = 'php';
            $path = sprintf("%squestions/codes/%d/code/%s/solution/solution.php", $coderoot, $qno, $lang);
            $code = file_get_contents($path);
        }

        // tags
        $tags = LibTag::getQuestionTags($qno);

        $this->assign('qno', $qno);
        $this->assign('question', $question);
        $this->assign('lang_list', $lang_list);
        $this->assign('lang', $lang);
        $this->assign('code', $code);
        $this->assign('brief', $brief);
        $this->assign('tags', $tags);
        $this->displayTemplate('question/question.tpl.php');
    }

    protected function topmenu() {
        return 'question';
    }

}
