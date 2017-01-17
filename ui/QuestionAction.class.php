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

        //  brief
        $path = sprintf("%squestions/%d/brief.md", $coderoot, $qno);
        $md = file_get_contents($path);
        $brief = Markdown::defaultTransform($md);

        //  solution
        $path = sprintf("%squestions/%d/code/php/solution/solution.php", $coderoot, $qno);
        $solution = file_get_contents($path);

        $question = DalQuestion::getQuestion($qno);

        $this->assign('qno', $qno);
        $this->assign('question', $question);
        $this->assign('solution', $solution);
        $this->assign('brief', $brief);
        $this->displayTemplate('question.tpl.php');
    }

}
