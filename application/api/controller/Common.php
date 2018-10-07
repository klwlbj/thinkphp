<?php
namespace app\api\controller;
use app\exception\ApiException;
use think\Controller;
//api模块公共控制器
class Common extends  Controller
{
//    初始化方法
    public function _initialize(){
        $this->checkRequestAuth();
    }
//    检查每次app请求的数据是否合法
    public  function checkRequestAuth(){
//        获取headers頭
        $headers=request()->header();
        halt($headers);
//        校检headers
    }
}
