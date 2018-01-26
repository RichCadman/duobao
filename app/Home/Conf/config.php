<?php
return array(
    //'配置项'=>'配置值'
    /* 默认设定 */
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'cow',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  'cow_',    // 数据库表前缀
    //添加模板变量规则
    'TMPL_PARSE_STRING'=>array(
       'PUBLIC'   => __ROOT__.'/pub',
        'CSS_A'      => __ROOT__.'/pub/admin/css',
        'JS_A'      => __ROOT__.'/pub/admin/js',
        'IMG_A'      => __ROOT__.'/pub/admin/img',
        'IMAGES_A'   => __ROOT__.'/pub/admin/images',
        'KIND'     => __ROOT__.'/pub/kindeditor',
        'CSS_H'      => __ROOT__.'/pub/home/css',
        'JS_H'      => __ROOT__.'/pub/home/js',
        'IMG_H'      => __ROOT__.'/pub/home/img',
        'IMAGES_H'   => __ROOT__.'/pub/home/images',
    ),
);