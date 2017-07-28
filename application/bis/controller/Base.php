<?php
/**
 * Created by PhpStorm.
 * User: htwy
 * Date: 2017/7/22
 * Time: 18:01
 */
namespace app\bis\controller;
use think\Controller;
class Base extends  Controller
{
    public $account;
    public function _initialize() {
        // 判定用户是否登录
        $isLogin = $this->isLogin();
        if(!$isLogin) {
            return $this->redirect(url('login/index'));
        }
    }

    //判定是否登录
    public function isLogin() {
        // 获取sesssion
        $user = $this->getLoginUser();
        if($user && $user->id) {
            return true;
        }
        return false;

    }

    public function getLoginUser() {
        if(!$this->account) {
            $this->account = session('bisAccount', '', 'bis');
        }
        return $this->account;
    }

}
