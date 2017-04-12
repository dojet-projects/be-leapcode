<?php
/**
 * Filename: ExamAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 4 12
 */
require UTIL.'Michelf/Markdown.inc.php';
use \Michelf\Markdown;

class ExamAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {
        $eiid = MRequest::param('eid');
        $invite = DalExamInvite::getInvite($eiid);
        if (is_null($invite)) {
            print 'exam not exists';
            return;
        }

        $invited_uid = $invite['invited_uid'];
        if ($me->uid() != $invited_uid) {
            print 'illegal exam';
            return;
        }

        $qno = $invite['qno'];

        $question = DalQuestion::getQuestion($qno);
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

        $lang = 'php';
        $path = sprintf("%squestions/codes/%d/code/%s/solution/solution.php", $coderoot, $qno, $lang);
        $code = file_get_contents($path);

        $this->assign('qno', $qno);
        $this->assign('question', $question);
        $this->assign('lang_list', $lang_list);
        $this->assign('lang', $lang);
        $this->assign('code', $code);
        $this->assign('brief', $brief);
        $this->displayTemplate('exam/exam.tpl.php');
    }

    protected function topmenu() {
        return 'question';
    }

}
