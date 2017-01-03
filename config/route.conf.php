<?php

Dispatcher::loadRoute(array(
    '/^$/' => UI.'HomeAction',
    '/^question/' => UI.'QuestionAction',
    '/^ajax\/run$/' => UI.'ajax/RunAction',
    )
);
