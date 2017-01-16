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

class QuestionAction extends XBaseAction {

    public function execute() {
        $qno = MRequest::param('qno');
        $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');
        $md_path = sprintf("%squestions/%d/brief.md", $coderoot, $qno);
        $md = file_get_contents($md_path);
        $brief = Markdown::defaultTransform($md);

        $this->assign('qno', $qno);
        $this->assign('brief', $brief);
        $this->displayTemplate('question.tpl.php');
    }

}
