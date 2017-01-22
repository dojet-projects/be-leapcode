<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question\/(?<qno>\d+)$/' => UI.'QuestionAction',
    '/^question\-list$/' => UI.'QuestionListAction',
    '/^question\/pick\-one$/' => UI.'PickOneAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',
    )
);
