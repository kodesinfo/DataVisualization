<?php
/**
 * Index Class
 * 
 * @file
 * @author  Kodes <kodesinfo@gmail.com>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램 입니다.
 * https://www.kodes.co.kr
 */
class Index {

    public $tpl;
    public $action;
    public $method;
    public $etc;
    public $data;
    public $session;

    public function __construct(){
		$this->setTemplate();
        $this->setParameter();
        $this->runClass();
        $this->printHtml();
    }

    /**
    * 템플릿 세팅
	*
	* input : 
    * @return
    */
    function setTemplate() {
		global $System;

        $this->tpl = new Template_();
        $this->tpl->compile_dir = $System['path']['compile'];
        $this->tpl->template_dir = $System['path']['template'];
    }

    /*
     *  디렉토리 주소를 parameter로 변경
     *  ex) https://www.kode.co.kr/$acion/$method/$etc
     */
    private function setParameter() {
        preg_match_all('/\/([^\/]+)/', $_GET['_url'], $tmp);

        $this->action = $tmp[1][0];
        $this->method = $tmp[1][1];
        $this->etc = $tmp[1][2];
    }

    /**
    * 해당 Class 의 method 실행
	* input : 
    * @return
    */
    private function runClass() {
        $className = ucfirst($this->action);

		if ($this->method != '') {
            $methodName = $this->action.ucwords($this->method);
            if (class_exists($className)) {
				$class = new $className();

                if (method_exists($class, $methodName)) {
                    $this->data['list'] = $class->$methodName();
                    $this->data['data'] = $_POST;
                }

                if ($this->etc != 'ajax' && method_exists($class, $this->etc)) {
                    $methodName = $this->etc;
                    $this->data['list'] = $class->$methodName();
                }
            }
        } else {
            if (!empty($_POST)) {
                $this->data['data'] = $_POST;
            }
			if($className=="LineChart2"){
				$className = "LineChart";
			}
            
			if (class_exists($className)) {
                $class  = new $className();
                $methodName = $this->action;
				
				if($this->action == "lineChart2"){
					$methodName = "lineChart";
				}

                if (method_exists($class, $methodName)) {
                    $this->data['list'] = $class->$methodName();
                }
            }
        }
    }


    /**
    * 실행된 내용을 화면에 출력
	* input : 
    * @return
    */
    function printHtml(){
		if($_GET['returnType'] == 'ajax'){
		    echo json_encode($this->data);
        }else if ($this->etc != 'ajax' && is_file($this->tpl->template_dir.$this->action.ucwords($this->method).'.html')) {
            if (!empty($this->data)){
               
                $this->tpl->assign($this->data);
            }
            $this->tpl->define(
                    array(
                    'index'=> $this->action.ucwords($this->method).'.html',
                    'top'=>'/include/top.html',
                    'left'=>'/include/left.html',
                    'header'=>'/include/header.html',
                    'right'=>'/include/right.html',
                    'paging'=>'/include/paging.html',
					'layoutBase'=>'include/layoutBase.html',
					'layoutContent'=>'/include/layout_'.$_SESSION['coid'].($this->method=="patch3"?2:'').'.html',
                    'navernews'=>'/naver/navernews.html',
                    'navermain_new'=>'/naver/navermain_new.xml'
                    ));
            $this->tpl->print_("index");
        } 
    }
}
?>