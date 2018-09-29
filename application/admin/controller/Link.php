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
            $add=LinkModel::create(input('post.'));
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
            $link=new LinkModel();
            $save=$link->save(input('post.'),['id'=>input('id')]);
            if($save){
                $this->success('success',url('lst'));}
            else{
                $this->error('fail');
            }
            return;
        }
        $links=LinkModel::find(input('id'));
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
