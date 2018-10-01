<?php
namespace app\admin\validate;
use think\Validate;
class Article extends  Validate
{
    protected  $rule=[
        'title'=>'unique:article|require|max:25',/*unique后加表名，验证唯一性*/
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
        'edit'=>['title','cateid'],/*应用场景*/
    ];
}
