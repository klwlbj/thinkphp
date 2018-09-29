<?php
namespace app\admin\controller;
use app\admin\model\Link as LinkModel;
use app\admin\controller\Common;
class Link extends  Common
{
    public function lst()
    {
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k=>$v){
                $cate->update(['id'=>$k,'sort'=>$v]);

            }
            $this->success('success',url('lst'));
            return;

        }
        return view('list');
    }

}
