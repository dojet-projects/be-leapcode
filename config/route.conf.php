<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question\/pick\-one$/' => UI.'question/PickOneAction',
    '/^question\/(?<title>.+)$/' => UI.'question/QuestionAction',
    '/^questions$/' => UI.'question/QuestionListAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',
    '/^ajax\/get\-lang\-code$/' => UI.'ajax/AjaxGetUserLangSolutionAction',

    '/^profile\/(?<nickname>.+)$/' => UI.'profile/ProfileAction',

    '/^account$/' => UI.'account/AccountAction',
    '/^account\/save\-nickname$/' => UI.'account/SaveNicknameAction',
    '/^account\/save\-personalinfo$/' => UI.'account/SavePersonalInfoAction',

    '/^tag\/(?<seo_tagname>.+)$/' => UI.'tag/TagAction',

    '/^you\-should\-be\-invited$/' => UI.'invite/YouShouldBeInvitedAction',
    '/^invite\/commit$/' => UI.'invite/InviteCommitAction',
    )
);
