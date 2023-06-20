<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
    $class = \Netlogix\Nxajaxpluginpage\Service\AcceptContentToHashBaseService::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['createHashBase'][$class] = $class . '->createHashBase';
});
