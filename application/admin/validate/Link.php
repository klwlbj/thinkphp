<?php
namespace app\admin\validate;
use think\Validate;
class Link extends  Validate
{
    protected  $rule=[
        'title'=>'unique:link|require|max:25',/*unique后加表名，验证唯一性*/
        'url'=>'url|unique:link|require|max:60',
        'desc'=>'require',
];
    protected $message=[
        'desc.require'=>'desc cannot null',
        'title.require'=>'title cannot null',
        'url.require'=>'url cannot null',
        'title.max'=>'title too long ',
        'url.max'=>'url too long ',
        'title.unique'=>'title to be unique',
        'url.unique'=>'url to be unique',
        'url.url'=>'url to be url',
        ];
    protected $scene=[
        'add'=>['title','url','desc'],/*应用场景*/
        'edit'=>['title','url'],/*应用场景*/
    ];
}
