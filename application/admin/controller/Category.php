<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/6/27
 * Time: 23:18
 */
namespace app\admin\controller;

use think\Controller;

class Category extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    /*
     * 添加
     * */
    public function add()
    {
        return $this->fetch();
    }

    /*
     * 保存
     * */
    public function save()
    {
        //print_r($_POST);
        //print_r(input('post.'));  //TP5自带打印方式
        //print_r(request()->post());

        if(!request()->isPost()) {
            $this->error('请求失败');
        }
        $data = input('post.');

        $validate = validate('Category');

        $data['name'] = htmlentities($data['name']);
        if(!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }

        if(!empty($data['id'])) {
            return $this->update($data);
        }
        //debug('end');
        //echo debug('begin', 'end','m');exit;

        // 把$data 提交model层
        $res = $this->obj->add($data);
        if($res) {
            $this->success('新增成功');
        }else {
            $this->error('新增失败');
        }
        return $this->fetch();
    }
}
