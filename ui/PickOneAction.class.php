<?php
/**
 * Homepage
 *
 * Filename: PickOneAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 20
 */
class PickOneAction extends SigninBaseAction {

    protected function pageExecute($is_signin) {
        $question = DalQuestion::getRandQuestion();
        $qno = $question['qno'];
        redirect('/question/'.$qno);
    }

}
