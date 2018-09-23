<?php
namespace app\admin\model;
use think\Model;
class Admin extends  Model
{

    public function addadmin($data)
    {
       if(empty($data)||!is_array($data)){
            return false;
       }
       if($data['password']){
           $data['password']=md5($data['password']);

       }
       if($this->save($data)){
                    return true;
                }else
                    {return false;
                    }
       }
       public  function  getadmin(){
        return $this::paginate(1);
       }
       public function saveadmin($data,$admins){

           if(!$data['name']){
               return 2;//用户名没写
           }
           if($data['password']){
               $data['password']=$admins['password'];
           }
           $res=db('admin')->update(input('post.'));
           return $res;
       }
    public  function  deladmin($id){
        if($this::destroy($id)){
            return 1;
        }else{
            return 2;
        }

    }
    public  function  login($data){
        $admin=Admin::getByname($data['name']);
        if($admin){
            if($admin['password']==md5($data['password'])){
                session('id',$admin['id']);
                session('name',$admin['name']);
                return 2;
            }
            else{
                return 3 ;
            }

        }
        else{
            return 1;
        }
    }




}
