<?php
/**
 * Created by PhpStorm.
 * User: htwy
 * Date: 2017/7/24
 * Time: 14:44
 */
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    public $city = '';
    public $account = '';

    public function _initialize() {
        // 城市数据
        $citys = model('City')->getNormalCitys();
        //用户数据

        $this->getCity($citys);
        // 获取首页分类的数据
        $cats = $this->getRecommendCats();
        $this->assign('citys', $citys);
        $this->assign('city', $this->city);
        $this->assign('cats', $cats);
        $this->assign('controler', strtolower(request()->controller()));
        $this->assign('user', $this->getLoginUser());
        $this->assign('title', 'nuomi团购');
    }

    public function getCity($citys) {
        $defaultuname = '';
        foreach($citys as $city) {
            $city = $city->toArray();
//            dump($city);
            if($city['is_default'] == 1) {
                $defaultuname = $city['uname'];
                break; // 终止foreach
            }
        }
        $defaultuname = $defaultuname ? $defaultuname : 'beijing';
//        dump($defaultuname);
        if(session('cityuname', '', 'o2o') && !input('get.city')) {
            $cityuname = session('cityuname', '', 'o2o');
        }else {
            $cityuname = input('get.city', $defaultuname, 'trim');
            session('cityuname', $cityuname, 'o2o');
        }

        $this->city = model('City')->where(['name'=>$cityuname])->find();
    }

    public function getLoginUser() {
        if(!$this->account) {
            $this->account = session('o2o_user', '', 'o2o');
        }
        return $this->account;
    }

    /**
     * 获取首页推荐当中的商品分类数据
     */
    public function getRecommendCats() {
        $parentIds = $sedcatArr = $recomCats = [];
        $cats = model('Category')->getNormalRecommendCategoryByParentId(0,5);
        foreach($cats as $cat) {
            $parentIds[] = $cat->id;
        }
        // 获取二级分类的数据
        $sedCats = model('Category')->getNormalCategoryIdParentId($parentIds);

        foreach($sedCats as $sedcat) {
            $sedcatArr[$sedcat->parent_id][] = [
                'id' => $sedcat->id,
                'name' => $sedcat->name,
            ];
        }

        foreach($cats as $cat) {
            // recomCats 代表是一级 和 二级数据，  []第一个参数是 一级分类的name, 第二个参数 是 此一级分类下面的所有二级分类数据
            $recomCats[$cat->id] = [$cat->name, empty($sedcatArr[$cat->id]) ? [] : $sedcatArr[$cat->id]];
        }
        return $recomCats;
    }
}
