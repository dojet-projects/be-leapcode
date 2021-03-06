<?php
use Mod\SimpleUser\ModuleSimpleUser;

require dirname(__FILE__).'/../be-dojet/dojet.php';
require dirname(__FILE__).'/../be-global/init.php';

define('UI', PRJ.'ui/');
define('CONFIG', PRJ.'config/');
define('MODEL', PRJ.'model/');
define('UTIL', PRJ.'util/');
define('TEMPLATE', PRJ.'template/');

Config::loadConfig(CONFIG.'const');
Config::loadConfig(CONFIG.'runtime');
Config::loadConfig(CONFIG.'global');
Config::loadConfig(CONFIG.'database/database');
Config::loadConfig(CONFIG.'redis/redis');
Config::loadConfig(CONFIG.'route');

DAutoloader::getInstance()->addAutoloadPathArray(
    array(
        dirname(__FILE__).'/dal/',
        dirname(__FILE__).'/lib/',
        MODEL,
    )
);

Dojet::addModule(__DIR__.'/../mod-simpleuser');
ModuleSimpleUser::module()->setDatabase(DBLEAPCODE);
Config::loadConfig(SIMPLEUSER_CONFIG.'route');
ModuleSimpleUser::config('delegate.signin', SingletonFactory::getInstance('SigninDelegate'));
ModuleSimpleUser::config('delegate.signincommit', SingletonFactory::getInstance('SigninDelegate'));
ModuleSimpleUser::config('delegate.signup', SingletonFactory::getInstance('SignupDelegate'));
ModuleSimpleUser::config('delegate.signupcommit', SingletonFactory::getInstance('SignupDelegate'));

$rc = Config::runtimeConfigForKeyPath('redis.server');
DRedis::init(array(
    'host' => $rc['hosts'][0],
    'port' => $rc['port'],
    'password' => $rc['password'],
    'timeout' => $rc['timeout'],
    'key_prefix' => 'lp:',
    )
);

// Dojet::addModule(__DIR__.'/../mod-simplecms');
// ModuleSimpleCMS::module()->setDatabase(DBDEMO);

// DRedis::init(array('host' => '10.100.13.86', 'port' => 6379, 'password' => '', 'timeout' => 10));

// Dojet::addModule(__DIR__.'/../mod-simplecms');
// ModuleSimpleCMS::module()->setDatabase(DBDEMO);

// ModuleFileUpload::setUploadRoot(Config::runtimeConfigForKeyPath('fileupload.upload'));
// ModuleFileUpload::setPublishRoot(Config::runtimeConfigForKeyPath('fileupload.publish'));
// ModuleFileUpload::setUrlRoot('http://www.sina.com.cn');
