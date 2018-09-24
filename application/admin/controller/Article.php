<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;
class Article extends  Common
{
    public  function  lst(){
        $artres=db('article')->field('a.*,b.catename')->alias('a')->join('bk_cate b','a.cateid=b.id')->paginate(2);
        $this->assign('artres',$artres);
        return view('list');
  }

    public  function  add(){
        if(request()->isPost()){
            $data=input('post.');
//            dump($data);die;
            $article=new ArticleModel();
            if($_FILES['thumb']['tmp_name']){
                $file = request()->file('thumb');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $thumb='/newbick/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
                    $data['thumb']=$thumb;
                }
            }
                if($article->save($data)){
                    $this->success('success',url('lst'));
                }
                else{
                    $this->error('fail');
                }
                return;
        }


        $cate= new CateModel();
        $cateres= $cate->catetree();
        $this->assign('cateres',$cateres);
        return view();
    }
    public  function  edit(){
        return view();
}
}
