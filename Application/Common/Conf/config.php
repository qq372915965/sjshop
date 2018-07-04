<?php

require_once($_SERVER['DOCUMENT_ROOT']."/config/config.php");

return array(
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  $MY_HOST, // 服务器地址
    'DB_NAME'               =>  'db_shop',  // 数据库名
    'DB_USER'               =>  $MY_USER,      // 用户名
    'DB_PWD'                =>  $MY_PWD,          // 密码
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	
	
);

