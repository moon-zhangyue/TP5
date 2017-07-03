<?php
namespace app\common\model;

use think\Db;
use think\Model;

class Category extends Model
{
    protected  $autoWriteTimestamp = true;  //定义默认时间属性
    /*
     * 保存
     * */
    public function add($data) {
        $data['status'] = 1; //默认状态
//        $data['create_time'] = time();
//        $data['update_time'] = time();
        $result = $this->save($data);
        //echo $this->getLastSql();exit;
        return $result;
    }

    /*
     * 获取一级分类
     * */
    public function getNormalFirstCategory() {
        $data = [
            'status' => 1,
            'parent_id' => 0,
        ];

        $order = [
            'id' => 'desc',
        ];
        return $this->where($data)->order($order)->select();
    }

    public function getFirstCategorys($parentId = 0) {
        $data = [
            'parent_id' => $parentId,
            'status' => ['neq',-1],
        ];

        $order =[
            'listorder' => 'desc',
            'id' => 'desc',
        ];
        $result = Db::name('category')->where($data)->order($order)->paginate();  //dump($result);  //数组
//        $result = $this->where($data)->order($order)->paginate(); //dump($result); //对象
//        echo $this->getLastSql();

        return $result;

    }

    public function getNormalCategoryByParentId($parentId=0) {
        $data = [
            'status' => 1,
            'parent_id' => $parentId,
        ];

        $order = [
            'id' => 'desc',
        ];

        return $this->where($data)->order($order)->select();
    }

    public function getNormalRecommendCategoryByParentId($id=0, $limit=5) {
        $data = [
            'parent_id' => $id,
            'status' => 1,
        ];

        $order = [
            'listorder' => 'desc',
            'id' => 'desc',
        ];

        $result = $this->where($data)->order($order);
        if($limit) {
            $result = $result->limit($limit);
        }

        return $result->select();

    }

    public function getNormalCategoryIdParentId($ids) {
        $data = [
            'parent_id' => ['in', implode(',', $ids)],
            'status' => 1,
        ];

        $order = [
            'listorder' => 'desc',
            'id' => 'desc',
        ];

        $result = $this->where($data)->order($order)->select();

        return $result;
    }
}