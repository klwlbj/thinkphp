<?php
namespace app\exception;

use think\exception\Handle;
use think\exception\HttpException;

class ApiHandleException extends Handle{
    public  $httpCode=500;
    public function render(\Exception $e){
        /*if(config('app_debug')==true){
            return parent::render($e);
        }*/
        if($e instanceof  ApiException){
            $this->httpCode=$e->httpCode;
            return show(0,$e->getMessage(),[],$this->httpCode);
//解決不可預知數據异常
        }
    }
}