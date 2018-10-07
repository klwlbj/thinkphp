<?php
namespace app\api\controller;
use app\exception\ApiException;
use think\Controller;

class Test extends  Common
{
    public function index()
    {
        return [
            'sss',
            's2ss',
        ];
    }
    public  function  update($id=0){

        halt(input('put.'));

    }
    public function  save(){
        $data= input('post.');
        if($data['mt']!=1){
            throw new ApiException(' illegal',400);
        }

        return show(1,'OK',input('post.'),201);
    }
}
