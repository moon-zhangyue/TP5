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
        print_r(\Map::getLngLat('北京三里屯'));

//        return $this->fetch();
        return 'dawdaw';
    }

    public function map() {
//        return 'aaa';
//        print_r(\Map::staticimage('北京昌平沙河地铁'));
        return \Map::staticimage('北京昌平沙河地铁');
    }

    public function welcome() {
        \phpmailer\Email::send('18500773034@163.com','tp5-emaiil','sucess-hello');
        return '发送邮件成功';
//        return $this->fetch();
//        return "欢迎来到o2o主后台首页!";
    }
}
