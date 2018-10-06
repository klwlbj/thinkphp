<?php
namespace app\admin\controller;
use app\admin\model\Conf as ConfModel;
use app\admin\controller\Common;
class Conf extends  Common
{
    public function lst(){
        if(request()->isPost()){
            $sorts=input('post.');
            $conf=new confModel;
            foreach ($sorts as $k=>$v){
                $conf->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('success',url('lst'));
            return;
        }
        $confres= ConfModel::order('sort desc')->paginate(2);
        $this->assign('confres',$confres);
        return  view('list');
    }
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            if($data['values']){
                $data['values']=str_replace('£¬',',',$data['values']);
            }
            $conf=new confModel;
            if($conf->save($data)){
                $this->success('add success',url('lst'));
                }
                else{
                    $this->error('error');
            }
        }
        return  view();
    }
    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            if($data['values']){
                $data['values']=str_replace('£¬',',',$data['values']);
            }
            $conf=new ConfModel();
            $save=$conf->save($data,['id'=>$data['id']]);
            if($save){
                $this->success('success',url('lst'));
            }
            else{
                $this->error('fail');
            }
        }
        $confs=ConfModel::find(input('id'));
        $this->assign('confs',$confs);
        return  view();
    }
    public function del(){
        $del=ConfModel::destroy(input('id'));
        if($del){
            $this->success('success',url('lst'));
        }
        else{
            $this->error('fail');
        }
        /*return view();*/
    }
    public function conf(){
        $confres=ConfModel::order('sort desc')->select();
        $this->assign('confres',$confres);
        return view();
    }
}
