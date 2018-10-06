<?php
namespace app\api\controller;

use think\Controller;

class Test extends  Controller
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
        return show(1,'OK',input('post.'),201);
    }
}
