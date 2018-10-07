<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;
class cate extends  Common
{
    protected  $beforeActionList=[
        'delsoncate'=>['only'=>'del'],
    ];
    public  function  delsoncate(){
        $cateid=input('id');
        $cate= new CateModel();
        $sonids=$cate->getchildrenid($cateid);
        $allcateid=$sonids;  /*ูxึตสýื้*/
        $allcateid[]=$cateid;
        foreach ($allcateid as $k=>$v) {
            $article=new ArticleModel();
            $article->where(array('cateid'=>$v))->delete();

        }
        if($sonids){
            db('cate')->delete($sonids);
        }

    }
    public function  edit(){
        $cate= new CateModel();
        if(request()->isPost()){
            $save=$cate->save(input('post.'),['id'=>input('id')]);
            if($save!==false){
                $this->success('success',url('lst'));
            }
            else{
                $this->error('fail');
            }
            return;
        }
        $cates=$cate->find(input('id'));
        $cateres=$cate->catetree();
        $this->assign(array(
                'cateres'=>$cateres,
                'cates'=>$cates,
        ));
        return view();
    }

    public function lst()
    {
        $cate= new CateModel();
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k=>$v){
                $cate->update(['id'=>$k,'sort'=>$v]);

            }
            $this->success('success',url('lst'));
            return;

        }
        $cateres=$cate->catetree();
//        echo json_encode($cateres); die;
        $this->assign('cateres',$cateres);
        return view('list');
    }
    public  function  add(){
        $cate= new CateModel();
        if(request()->isPost()){
            $add=$cate->save(input('post.'));
            if($add){
                $this->success('success',url('lst'));
            }

            else{
                $this->error('add fail');
            }
        }
        $cateres=$cate->catetree();
        $this->assign('cateres',$cateres);
        return view();
    }
    public function del(){
        $del=db('cate')->delete(input('id'));
        if($del){
            $this->success('success',url('lst'));

        }else{
            $this->error('fail');
        }
    }
}
?>