<?php
/**
 * Created by PhpStorm.
 * User: htwy
 * Date: 2017/7/24
 * Time: 14:33
 */
namespace app\common\model;

use think\Model;

class User extends BaseModel
{
    public function add($data = []) {
        // 如果提交的数据不是数组
        if(!is_array($data)) {
            exception('传递的数据不是数组');
        }

        $data['status'] = 1;
        return $this->data($data)->allowField(true)->save();
    }

    /**
     * 根据用户名获取用户信息
     * @param $username
     */
    public function getUserByUsername($username) {
        if(!$username) {
            exception('用户名不合法');
        }

        $data = ['username' => $username];
        return $this->where($data)->find();
    }
}