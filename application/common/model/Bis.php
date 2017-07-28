<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 22:07
 */
namespace app\common\model;

use think\Model;

class Bis extends Model
{
    /**
     * 通过状态获取商家数据
     * @param $status
     */
    public function getBisByStatus($status=0) {
        $order = [
            'id' => 'desc',
        ];

        $data = [
            'status' => $status,
        ];
        $result = $this->where($data)->order($order)->paginate();
        return $result;
    }
}