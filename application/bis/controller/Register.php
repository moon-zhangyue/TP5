<?php
namespace app\bis\controller;

use think\Controller;

class Register extends Controller
{
    public function index()
    {
        //获取一级城市的数据
        $citys = model('City')->getNormalCitysByParentId();
        //获取一级栏目的数据
        $categorys = model('Category')->getNormalCategoryByParentId();
        return $this->fetch('',[
            'citys' => $citys,
            'categorys' => $categorys,
        ]);
    }
}