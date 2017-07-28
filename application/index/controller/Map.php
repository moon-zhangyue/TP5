<?php
/**
 * Created by PhpStorm.
 * User: htwy
 * Date: 2017/7/25
 * Time: 14:48
 */
namespace app\index\controller;
use think\Controller;

class Map extends Controller
{
    public function getMapImage($data)
    {
        return \Map::staticimage($data);
    }
}
