<?php
namespace app\bis\controller;
use think\Controller;
class Index extends  Base
{
    public function index()
    {
        return $this->fetch();
    }
}
