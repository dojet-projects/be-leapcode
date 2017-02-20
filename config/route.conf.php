<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question\/pick\-one$/' => UI.'PickOneAction',
    '/^question\/(?<title>.+)$/' => UI.'QuestionAction',
    '/^question\-list$/' => UI.'QuestionListAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',
    )
);

// Dispatcher::loadRoute(array(
//     '/^signin$/' => UI.'SimpleSigninAction',
//     '/^signup$/' => UI.'SimpleSignupAction',
//     '/^signout$/' => UI.'SimpleSignoutAction',
//     '/^signin\-commit$/' => UI.'SimpleSigninCommitAction',
//     '/^signup\-commit$/' => UI.'SimpleSignupCommitAction',
//     )
// );
