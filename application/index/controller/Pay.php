<?php
/**
 * Created by PhpStorm.
 * User: htwy
 * Date: 2017/7/25
 * Time: 15:43
 */
namespace app\index\controller;
use think\Controller;

class Pay extends Base
{
    public function notify()
    {

        return $this->fetch();
    }

}