<?php


class BaseController extends Yaf_Controller_Abstract
{
    public function output(array $data=[]){
        if (!empty($data)){
            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        return false;
    }
}