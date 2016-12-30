<?php
define('C_RUNTIME_LOCAL', 'runtime_local');
define('C_RUNTIME_105', 'runtime_105');
define('C_RUNTIME_228', 'runtime_228');
define('C_RUNTIME_MAC2010', 'mac2010');

$__c = &Config::configRefForKeyPath('runtime');

if (defined('RUNTIME')) {
    $__c = RUNTIME;
} elseif (file_exists('/var/.iam105')) {
    $__c = C_RUNTIME_105;
} elseif (file_exists('/var/.iam228')) {
    $__c = C_RUNTIME_228;
} elseif (file_exists('/var/.iammac2010')) {
    $__c = C_RUNTIME_MAC2010;
} else {
    throw new Exception("illegal runtime", 1);
}

unset($__c);