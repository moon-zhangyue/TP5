<?php
namespace app\common\model;

use think\Db;
use think\Model;

class Order extends Model
{
    protected  $autoWriteTimestamp = true;  //定义默认时间属性
    /*
     * 保存
     * */
    public function add($data) {
        $data['status'] = 1; //默认状态
//        $data['create_time'] = time();
//        $data['update_time'] = time();
        $this->save($data);
        return $this->id;
    }

}