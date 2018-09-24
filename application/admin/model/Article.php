<?php
namespace app\admin\model;
use think\Model;
class Article extends  Model
{
    protected static function init(){
        Article::event('before_update',function ($article){
            if($_FILES['thumb']['tmp_name']){
                $file=request()->file("thumb");
                $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                if($info){
                    $thumb='/newbick/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
                    $article['thumb']=$thumb;
                }
                $arts=Article::find($article->id);
                if (file_exists($arts->thumb)){
                    @unlink($arts->thumb);
                }
            }
        });
    }




}
