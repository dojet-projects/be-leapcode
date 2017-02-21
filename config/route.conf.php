<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question\/pick\-one$/' => UI.'PickOneAction',
    '/^question\/(?<title>.+)$/' => UI.'QuestionAction',
    '/^question\-list$/' => UI.'QuestionListAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',

    '/^profile$/' => UI.'profile/ProfileAction',
    )
);
