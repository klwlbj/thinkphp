<?php
namespace  app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
    public  function  index(){
        if(request()->isPost()){
            $admin=new Admin();
            $num=$admin->login(input('post.'));
            if($num==1){
                $this->error('check name failed!');

            }
            if($num==2){
                $this->success('success!',url('index/index'));

            }
            if($num==3){
               $this->error('mistake of password');
            }
        }
        return view();
    }
}