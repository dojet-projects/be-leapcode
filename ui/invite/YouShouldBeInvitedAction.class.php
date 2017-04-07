<?php
/**
 * Homepage
 *
 * Filename: YouShouldBeInvitedAction.class.php
 *
 * @author liyan
 * @since 2017 4 6
 */
class YouShouldBeInvitedAction extends XBaseAction {

    public function execute() {
        $this->displayTemplate('invite/you-should-be-invited.tpl.php');
    }

}
