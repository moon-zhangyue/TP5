<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 22:10
 */
namespace app\common\model;

use think\Model;

class BisLocation extends BaseModel
{

    public function getNormalLocationByBisId($bisId) {
        $data = [
            'bis_id' => $bisId,
            'status' => 1,
        ];

        $result = $this->where($data)->order('id', 'desc')->select();
        return $result;
    }

    public function getNormalLocationsInId($ids) {
        $data = [
            'id' => ['in', $ids],
            'status' => 1,
        ];
        return $this->where($data)->select();
    }

}