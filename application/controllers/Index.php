<?php
/**
 * @name IndexController
 * @author desktop-psdtel6\win10
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
use \Firebase\JWT\JWT;
class IndexController extends Yaf_Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/Sample/index/index/index/name/desktop-psdtel6\win10 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
        $key = "example_key";
        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );
        $jwt = JWT::encode($payload, $key);
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        print_r((array)$decoded);
        print_r($jwt);

        exit;
		//1. fetch query
		$get = $this->getRequest()->getQuery("m", "default value");
        var_dump($this->getRequest()->isGet());
		//2. fetch mode
		$model = new SampleModel();
		$cymodel = new cyModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample().$cymodel->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return true;
	}
}
