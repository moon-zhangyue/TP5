<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/23
 * Time: 23:50
 */
namespace app\admin\controller;
use think\Controller;
class Base extends  Controller {

    public function status() {
        // 获取值
        $data = input('get.');
        // 利用tp5 validate 去做严格检验  id  status
        if(empty($data['id'])) {
            $this->error('id不合法');
        }
        if(!is_numeric($data['status'])) {
            $this->error('status不合法');
        }

        // 获取控制器
        $model = request()->controller();
        //echo $model;exit;
        $res = model($model)->save(['status'=>$data['status']], ['id'=>$data['id']]);
        if($res) {
            $this->success('更新成功');
        }else {
            $this->error('更新失败');
        }
    }

    // 排序功能 也放到 base
}