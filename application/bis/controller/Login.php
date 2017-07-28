<?php
namespace app\bis\controller;
use think\Controller;
class Login extends  Controller
{
    public function index()
    {
        if(request()->isPost()) {
            // 登录的逻辑
            //获取相关的数据
            $data = input('post.');
            // 通过用户名 获取 用户相关信息
            // 严格的判定

            $ret = model('BisAccount')->get(['username'=>$data['username']]);

            if(!$ret || $ret->status !=1 ) {
                $this->error('更改用户不存在，获取用户未被审核通过');
            }

            if($ret->password != md5($data['password'].$ret->code)) {
                $this->error('密码不正确');
            }

            model('BisAccount')->updateById(['last_login_time'=>time()], $ret->id);
            // 保存用户信息  bis是作用域
            session('bisAccount', $ret, 'bis');
            return $this->success('登录成功', url('index/index'));


        }else {
            // 获取session
            $account = session('bisAccount', '', 'bis');
            if($account && $account->id) {
                return $this->redirect(url('index/index'));
            }
            return $this->fetch();
        }
    }

    public function logout() {
        // 清除session
        session(null, 'bis');
        // 跳出
        $this->redirect('login/index');
    }
}