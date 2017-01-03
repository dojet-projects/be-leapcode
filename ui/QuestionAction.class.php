<?php
/**
 * Homepage
 *
 * Filename: QuestionAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 3
 */
class QuestionAction extends XBaseAction {

    public function execute() {
        $this->displayTemplate('question.tpl.php');
    }

}
