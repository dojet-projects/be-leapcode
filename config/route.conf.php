<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question\/(?<qno>\d+)$/' => UI.'QuestionAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',
    )
);
