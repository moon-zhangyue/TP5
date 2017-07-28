<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/23
 * Time: 23:36
 */
namespace app\common\model;

use think\Model;

class Deal extends BaseModel
{

    public function getNormalDeals($data = []) {
        $data['status'] = 1;
        $order = ['id'=>'desc'];

        $result = $this->where($data)->order($order)->paginate();

        echo $this->getLastSql();
        return  $result;
    }

    public function getApplyDeals($data = []) {
        $data['status'] = 0;
        $order = ['id'=>'desc'];

        $result = $this->where($data)->order($order)->paginate();

        // echo $this->getLastSql();
        return  $result;
    }

    /**
     * 根据分类 以及 城市来获取 商品数据
     * @param $id 分类
     * @param $cityId 城市
     * @param int $limit 条数
     */
    public function getNormalDealByCategoryCityId($id, $cityId, $limit=10) {
        $data  = [
            'end_time' => ['gt', time()],
            'category_id' => $id,
            'city_id' => $cityId,
            'status' => 1,
        ];

        $order = [
            'listorder'=>'desc',
            'id'=>'desc',
        ];

        $result = $this->where($data)->order($order);
        if($limit) {
            $result = $result->limit($limit);
        }
        return $result->select();
    }

    public function getDealByConditions($data=[], $orders) {
        if(!empty($orders['order_sales'])) {
            $order['buy_count'] = 'desc';
        }
        if(!empty($orders['order_price'])) {
            $order['current_price'] = 'desc';
        }
        if(!empty($orders['order_time'])) {
            $order['create_time'] = 'desc';
        }
        $order['id'] = 'desc';


        $datas[] = ' end_time> '.time();
        $datas[] = ' status= 1';

        if(!empty($data['se_category_id'])) {

            $datas[]="find_in_set(".$data['se_category_id'].",se_category_id)";
        }
        if(!empty($data['category_id'])) {

            $datas[]="category_id = ".$data['category_id'];
        }
        if(!empty($data['city_id'])) {

            $datas[]="city_id = ".$data['city_id'];
        }

        $result = $this->where(implode(' AND ',$datas))->order($order)->paginate();

        return $result;
    }
}