<?php
ini_set("auto_detect_line_endings", true);
error_reporting(~1);
ini_set('display_errors', 1);
class fetchContent{

public function request(){

		$pass			= $_REQUEST['k'];
		$requestURL		= $_REQUEST['lnk'];
		$tgpat			= $_REQUEST['tgpat'];
		$uncodechng		= $_REQUEST['u'];
		
		$img = "";
		$img			= $_REQUEST['img'];
		
		if (isset($pass) && isset($requestURL) && isset($tgpat) && isset($uncodechng)){
			if(!$this->getDecodedeKey($pass)){
				header('HTTP1/1 404 NOT FOUND');
				die('Access Denied');
			}
		}else{
			header('HTTP1/1 404 NOT FOUND');
			die('Access Denied');
		}
		$tgpat = urldecode($tgpat);
		$uncodechng	 = (int)$uncodechng	;

		$mxpath = strpos($tgpat,"|||||");

		if($mxpath){

			$tgpats = explode("|||||",$tgpat);

			$json = "";
			foreach($tgpats as $p){
				$json .= $this->my_file_get_contents($requestURL,$p,(int)$uncodechng,$img);
			
				if(count($json)>60) break;
			}
		}else{	
			$json = $this->my_file_get_contents($requestURL,$tgpat,(int)$uncodechng,$img);
		}
		if($json ){
			echo $json;
		}
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
	public function my_file_get_contents($url,$xpathTxt,$uyesno,$img){
		//$url = 'http://www.zoomit.ir/2017/7/9/188851/solar-eclipse-proved-einstein-right/';
		//$xpathTxt = '//*[@id="ArticleDetails"]/div/div[2]/div[5]/*';
		
		$strexport = "<div><p>";
		$source = file_get_contents($url);
		$source = mb_convert_encoding($source, 'HTML-ENTITIES', "UTF-8");

		$dom = new DOMDocument();

		@$dom->loadHTML($source);

		$xpath = new DOMXPath($dom);

		$rows = $xpath->query($xpathTxt);
		
		$i= 1;
		if($uyesno==1){

			foreach($rows as $index => $row){ 

				if($row->nodeName!='button'){
					if($row->hasChildNodes()){
						$rowsNodes = $row->childNodes;

						foreach($rowsNodes as $rowsNode){
							if($rowsNode->nodeName!='button'){

							if($rowsNode->nodeName=='#text'){
									$strexport.=  $rowsNode->textContent;
								}else{
									$strexport.= "<" . $rowsNode->nodeName . ">" . $rowsNode->textContent . "</" . $rowsNode->nodeName . ">";								
								}
							}
						}
					}
				}
				$i+=1;
			}
		}else{
			foreach($rows as $index => $row){ 
				if($row->nodeName!='button'){
					$strexport.= "<" . $row->nodeName . ">" . $row->textContent . "</" . $row->nodeName . ">" ;
				}
				$i+=1;
			}
		}
		$strexport .= "</div></p>";	
		
		$arexport = array("content"=>$strexport,"imgscr"=>"");
		$imgscr = "";
		if($img!=""){
			$img = urldecode($img); 
			$rows = $xpath->query($img);
		
			$arexport["imgscr"] = $rows[0]->textContent;

		}
		
		return json_encode($arexport);
	}


}
$nc = new fetchContent();
$nc->request();