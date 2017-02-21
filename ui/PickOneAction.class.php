<?php
/**
 * Homepage
 *
 * Filename: PickOneAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2017 1 20
 */
class PickOneAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $question = DalQuestion::getRandQuestion();
        $seo_title = $question['seo_title'];
        redirect('/question/'.$seo_title);
    }

}
