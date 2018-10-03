<?php
namespace app\admin\controller;
use app\admin\model\Conf as ConfModel;
use app\admin\controller\Common;
class Conf extends  Common
{
    public function lst(){
        return  view('list');
    }
    public function add(){
        return  view();
    }
    public function edit(){
        return  view();
    }
}
