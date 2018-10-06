<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//通用化API接口数据输出
//业务状态码 信息提示 数据 http状态码
function show($status,$message,$data=[],$httpCode=200){
    $data=[
        'status'=>$status,
        'messsage'=>$message,
        'data'=>$data,
    ];
    return json($data,$httpCode);
}