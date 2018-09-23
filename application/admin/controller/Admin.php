<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
class Admin extends  Common
{


    public function lst()
    {

        $admin= new AdminModel();
        $adminres= $admin->getadmin();
        $this->assign('adminres',$adminres);

        return view('list'); /*第一种*/

//        $view=new View([
//            'view_suffix'=>'htm',/*要先配置*/
//        ]);
//        return $view->fetch('list'); 第二种

//        return $this->fetch('list');/*第三种*/
    }
    public function add()
    {
        if(request()->isPost()){
//            $data=input('post.');
//            $res=Db::table('bk_admin')->insert($data);
////            dump($res);die;
            $admin= new AdminModel();
            if($admin->addadmin(input('post.'))){
                $this->success('added success!',url('lst'));
            }
            else{
                $this->error('fail');
            }
            return;
        }
        return view(); /*第一种*/


    }
    public function edit($id)
    {
        $admins=db('admin')->find($id);
        if(request()->isPost()){
            $data=input('post.');
            $admin=new AdminModel();
            $res=$admin->saveadmin($data,$admins);
            if($res=="2"){
                $this->error('name is null');
            }
            if($res!==false){
                $this->success("修改成功",url('lst'));
            }
            else{
                $this->error('mistake');
            }
            return;
        }

        if(!$admins){
            $this->error('mistake');
        }
        $this->assign('admin',$admins);
        return view(); /*第一种*/


    }
    public  function  del($id){
        $admin= new AdminModel();
        $delmum=$admin->deladmin($id);
        if($delmum=='1'){
            $this->success('success',url('list'));
        }
        else{
            $this->error('fail');
        }
    }
    public  function  logout(){
        session(null);
        $this->success('sucess',url('login/index'));
    }
}
