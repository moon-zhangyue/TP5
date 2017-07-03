<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/6/27
 * Time: 23:18
 */
namespace app\admin\controller;

use think\Controller;
use think\Debug;

class Category extends Controller
{

    private  $obj;
    public function _initialize() {
        $this->obj = model("Category");
    }

    public function index()
    {
        $parentId = input('get.parent_id', 0, 'intval');
        $categorys = $this->obj->getFirstCategorys($parentId);

        //3.2输出方式
//        $this->assign('categorys',$categorys);
//        return $this->fetch();

        //5.0输出方式
        return $this->fetch('',[
            'categorys'=>$categorys,
        ]);
    }

    /*
     * 添加
     * */
    public function add()
    {
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys'=> $categorys,
        ]);
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
            echo '错误';
            $this->error($validate->getError());
        }

        if(!empty($data['id'])) {
            return $this->update($data);
        }
        //debug('end');
        //echo debug('begin', 'end','m');exit;

        // 把$data 提交model层
        $model = model('Category');
        $res = $model -> add($data);
//        $res = $this->obj->add($data);
        if($res) {
            $this->success('新增成功');
        }else {
            $this->error('新增失败');
        }
        return $this->fetch();
    }

    /**
     * 编辑页面
     */
    public function edit($id=0) {
        if(intval($id) < 1) {
            $this->error('参数不合法');
        }
        $category = $this->obj->get($id);
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys'=> $categorys,
            'category' => $category,
        ]);
    }

    public function update($data) {
        $res =  $this->obj->save($data, ['id' => intval($data['id'])]);
        if($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }

    /*
     * 排序逻辑
     * */
    public function listorder($id, $listorder) {
        $res = $this->obj->save(['listorder'=>$listorder], ['id'=>$id]);
        if($res) {
            $this->result($_SERVER['HTTP_REFERER'], 1, 'success');
        }else {
            $this->result($_SERVER['HTTP_REFERER'], 0, '更新失败');
        }
    }


    /*
     * 修改状态
     * */
    public function status() {
        $data = input('get.');
        $validate = validate('Category');
        if(!$validate->scene('status')->check($data)) {
            $this->error($validate->getError());
        }

        $res = $this->obj->save(['status'=>$data['status']], ['id'=>$data['id']]);
        if($res) {
            $this->success('状态更新成功');
        }else {
            $this->error('状态更新失败');
        }

    }
}
