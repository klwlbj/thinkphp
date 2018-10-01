<?php
namespace app\admin\validate;
use think\Validate;
class Article extends  Validate
{
    protected  $rule=[
        'title'=>'unique:article|require|max:25',/*unique��ӱ�������֤Ψһ��*/
        'cateid'=>'require',
        'content'=>'require',
];
    protected $message=[
        'title.require'=>'title cannot null',
        'title.max'=>'title too long ',
        'title.unique'=>'title to be unique',
        'cateid.require'=>'cateid cannot null',
        'content.require'=>'content cannot null',
        ];
    protected $scene=[
        'add'=>['title','cateid','content'],
        'edit'=>['title','cateid'],/*Ӧ�ó���*/
    ];
}
