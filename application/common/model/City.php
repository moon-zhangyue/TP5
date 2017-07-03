<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/3
 * Time: 23:02
 */
namespace app\Common\model;

use think\Model;

class City extends Model
{
    //获取城市父级id
    public function getNormalCitysByParentId($parentId=0) {
        $data = [
            'status' => 1,
            'parent_id' => $parentId,
        ];

        $order = [
            'id' => 'asc',
        ];
        return $this->where($data)->order($order)->select();
    }

    //获取城市
    public function getNormalCitys() {
        $data = [
            'status' => 1,
            'parent_id' => ['gt', 0],
        ];

        $order = ['id'=>'asc'];
        return $this->where($data)->order($order)->select();

    }
}