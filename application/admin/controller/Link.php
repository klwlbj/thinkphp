<?php
namespace app\admin\controller;
use app\admin\model\Link as LinkModel;
use app\admin\controller\Common;
class Link extends  Common
{
    public function lst()
    {
        $link=new LinkModel();
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k=>$v){
                $link->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('success',url('lst'));
            return;
        }
        $linkres=LinkModel::order('sort desc')->paginate(10);
        $this->assign('linkres',$linkres);
        return view('list');
    }
    public  function  add(){
        if (request()->isPost()){
            $data=input('post.');
            $validate=\think\Loader::validate('link');
            if(!$validate->scene('add')->check($data)){
                $this->error(($validate->getError()));
            }/*服務器端表单验证，错误時跳出*/
            $add=LinkModel::create($data);
            if($add){
                $this->success('success',url('lst'));}
            else{
                $this->error('fail');
                }
            }

        return view();
    }
    public function  edit(){
        if (request()->isPost()){
            $data=input('post.');
            $validate=\think\Loader::validate('link');
            if(!$validate->scene('edit')->check($data)){
                $this->error(($validate->getError()));
            }/*服務器端表单验证，错误時跳出*/
            $link=new LinkModel();
            $save=$link->save($data,['id'=>$data['id']]);
            if($save!=false){
                $this->success('success',url('lst'));}
            else{
                $this->error('fail');
            }
            return;
        }
        $links=LinkModel::find(input('id'));
      /*  dump($links);die();*/
        $this->assign('links',$links);
        return view();
    }

    public  function del(){
        $del=LinkModel::destroy(input('id'));
        if($del){
            $this->success('success',url('lst'));}
        else{
            $this->error('fail');
        }
    }
}
