<?php
define('DBLEAPCODE',    'DBLEAPCODE');

$__c = &Config::configRefForKeyPath('database');

$__c[C_RUNTIME_ALIYUN] = array(
    DBLEAPCODE => array(
        'r' => array(
            'hosts' => array(
                array('h' => '127.0.0.1', 'p' => 3306),
                ),
            'username' => 'root',
            'password' => 'fTwd201$',
            'dbname' => 'leap',
            'charset' => 'utf8',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array(
                array('h' => '127.0.0.1', 'p' => 3306),
                ),
            'username' => 'root',
            'password' => 'fTwd201$',
            'dbname' => 'leap',
            'charset' => 'utf8',
            'timeout' => 1, //sec
        ),
    ),
);

