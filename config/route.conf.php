<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question\/(?<qno>\d+)$/' => UI.'QuestionAction',
    '/^question\-list$/' => UI.'QuestionListAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',
    )
);
