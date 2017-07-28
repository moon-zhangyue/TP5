<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use think\File;
class Image extends Controller
{
    public function upload()
    {
        $file = Request::instance()->file('file');  //获取上传文件信息
        // 给定一个目录
        $info = $file->move('upload');
        if($info && $info->getPathname()) {
            return show(1, 'success','/'.$info->getPathname());
        }
        return show(0,'upload error');
    }
}