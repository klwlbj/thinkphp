<?php
namespace app\admin\model;
use think\Model;
class Article extends  Model
{
    protected static function init(){
        Article::event('before_update',function ($article){
            if($_FILES['thumb']['tmp_name']){
                $arts=Article::find($article->id);
                $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
//                $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                if (file_exists($thumbpath)){
                    @unlink($thumbpath);
                }
                $file=request()->file('thumb');
                $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                if($info){
                    $thumb='/newbick/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
                    $article['thumb']=$thumb;
                }/*上传图片后删除图片*/
            }
        });
        Article::event('before_delete',function ($article){
                $arts=Article::find($article->id);
                $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
//                $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                if (file_exists($thumbpath)){
                    @unlink($thumbpath);
                }

        });
    }




}
