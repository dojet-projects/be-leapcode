<?php
define('C_RUNTIME_LOCAL', 'runtime_local');
define('C_RUNTIME_228', 'runtime_228');
define('C_RUNTIME_MAC2010', 'mac2010');
define('C_RUNTIME_UBUNTU16', 'ubuntu16');
define('C_RUNTIME_BWG', 'bwg');

$__c = &Config::configRefForKeyPath('runtime');

if (defined('RUNTIME')) {
    $__c = RUNTIME;
} elseif (file_exists('/var/.iambwg')) {
    $__c = C_RUNTIME_BWG;
} elseif (file_exists('/var/.iam228')) {
    $__c = C_RUNTIME_228;
} elseif (file_exists('/var/.iammac2010')) {
    $__c = C_RUNTIME_MAC2010;
} elseif (file_exists('/var/.iamubuntu16')) {
    $__c = C_RUNTIME_UBUNTU16;
} else {
    throw new Exception("illegal runtime", 1);
}

unset($__c);