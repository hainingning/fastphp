<?php

$config = [
    // 数据库配置
    'db' => [
        'host' => 'localhost',
        'dbname' => 'project',
        'username' => 'root',
        'password' => '123456',
        'port' => '3307'
    ],

    // 默认控制器和操作名
    'defaultController' => 'Item',
    'defaultAction' => 'index'
];

return $config;