<?php
/**
 * Filename: AccountAction.class.php
 *
 * @author liyan
 * @since 2017 2 20
 */
class AccountAction extends SigninPageBaseAction {

    protected function signinPageExecute(MLeapUser $me) {
        $this->displayTemplate('account/account.tpl.php');
    }

}
