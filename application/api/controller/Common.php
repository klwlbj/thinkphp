<?php
namespace app\api\controller;
use app\exception\ApiException;
use think\Controller;
//apiģ�鹫��������
class Common extends  Controller
{
//    ��ʼ������
    public function _initialize(){
        $this->checkRequestAuth();
    }
//    ���ÿ��app����������Ƿ�Ϸ�
    public  function checkRequestAuth(){
//        ��ȡheaders�^
        $headers=request()->header();
        halt($headers);
//        У��headers
    }
}
