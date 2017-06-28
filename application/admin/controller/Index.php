<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function test()
    {
//        return $this->fetch();
        return 'dawdaw';
    }

    public function welcome() {
        //\phpmailer\Email::send('463785435@qq.com','tp5-emaiil','sucess-hala');
        //return '发送邮件成功';
//        return $this->fetch();
        return "欢迎来到o2o主后台首页!";
    }
}
