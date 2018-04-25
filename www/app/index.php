<?php
ini_set("auto_detect_line_endings", true);
error_reporting(~0);
ini_set('display_errors', 1);
class nodeChooser{
/* 		"http://nd01-robic.rhcloud.com/",
		"http://nd02-robic.rhcloud.com/",		
		"http://mynd001-tavrij01.rhcloud.com/",
		"http://mynd002-tavrij01.rhcloud.com/",
		"http://mynd003-tavrij01.rhcloud.com/",
 */	public $nodes;
	
// nodes selecting 22 dayes from heroku is here. started dey is 06/02/2017 :)
// switch to next seris is 27/02/2017
	public function nodeseris(){
			$myTimeNow =(int)date('d');
			//echo($myTimeNow % 6);die;
			switch ($myTimeNow % 6) {
				case 3:
					$this->nodes = array(
						"http://gsnd0001-tavrij01.rhcloud.com/",
						"http://gsnd0002-tavrij01.rhcloud.com/",
						"https://gsnd001.herokuapp.com/",
						"https://gsnd002.herokuapp.com/",
						"https://gsnd003.herokuapp.com/",
						"https://gsnd004.herokuapp.com/",
						"https://gsnd005.herokuapp.com/"
					);
					break;
				case 4:
					$this->nodes = array(
						"http://gsnd0001-tavrij01.rhcloud.com/",
						"http://gsnd0002-tavrij01.rhcloud.com/",
						"https://gsnd006.herokuapp.com/",
						"https://gsnd007.herokuapp.com/",
						"https://gsnd008.herokuapp.com/",
						"https://gsnd009.herokuapp.com/",
						"https://gsnd010.herokuapp.com/"
					);					break;
				case 5:
					$this->nodes = array(
						"http://gsnd0001-tavrij01.rhcloud.com/",
						"http://gsnd0002-tavrij01.rhcloud.com/",
						"https://gsnd011.herokuapp.com/",
						"https://gsnd012.herokuapp.com/",
						"https://gsnd013.herokuapp.com/",
						"https://gsnd014.herokuapp.com/",
						"https://gsnd015.herokuapp.com/"
					);					break;
				case 0:
					$this->nodes = array(
						"http://gsnd0001-tavrij01.rhcloud.com/",
						"http://gsnd0002-tavrij01.rhcloud.com/",
						"https://gsnd016.herokuapp.com/",
						"https://gsnd017.herokuapp.com/",
						"https://gsnd018.herokuapp.com/",
						"https://gsnd019.herokuapp.com/",
						"https://gsnd020.herokuapp.com/"
					);					break;
				case 1:
					$this->nodes = array(
						"http://gsnd0001-tavrij01.rhcloud.com/",
						"http://gsnd0002-tavrij01.rhcloud.com/",
						"https://gsnd021.herokuapp.com/",
						"https://gsnd022.herokuapp.com/",
						"https://gsnd023.herokuapp.com/",
						"https://gsnd024.herokuapp.com/",
						"https://gsnd025.herokuapp.com/"
					);					break;
				case 2:
					$this->nodes = array(
						"http://gsnd0001-tavrij01.rhcloud.com/",
						"http://gsnd0002-tavrij01.rhcloud.com/",
						"https://gsnd026.herokuapp.com/",
						"https://gsnd027.herokuapp.com/",
						"https://gsnd028.herokuapp.com/",
						"https://gsnd029.herokuapp.com/",
						"https://gsnd030.herokuapp.com/"
					);					break;
			}
	}
	public $fileContent;

	public function __construct(){
		$this->fileContent = file('./nodes.txt');
	}
	public function getNewNode(){
		$selectedNode = array_rand($this->nodes);
		//var_dump($this->nodes);
		//$j = -1;
		$maxNodes = count($this->nodes) -1;
	//	var_dump ("maxNodes=" . $maxNodes . " | selectedNode=" . $selectedNode);
		for ($i=0; $i<=$maxNodes; $i++){
			if ($this->fileContent[$i] < $this->fileContent[$selectedNode]){
				//$j=$i;
				$selectedNode=$i;
			}
			//var_dump ("<br>" . "fileContent[$i]" . $this->fileContent[$i] . "fileContent[$selectedNode]" . $this->fileContent[$selectedNode]);
		}
		// if ($j != -1){
			// $selectedNode = $j;
		// } 
		//var_dump("<br/>selectedNode=" . $selectedNode);
		//die;
		return $selectedNode;
	}
	public function request(){
	$this->nodeseris();
	//print_r($this->nodes);die;
	
	
		$pass = $_REQUEST['k'];
		$title = $_REQUEST['title'];
		if (isset($pass) && isset($title)){
			if(!$this->getDecodedeKey($pass)){
				header('HTTP1/1 404 NOT FOUND');
				die('Access Denied');
			}
		}else{
			header('HTTP1/1 404 NOT FOUND');
			die('Access Denied');
		}
		$serverID = $this->getNewNode();
		// develope is here !!!
		$randomServerName = $this->nodes[$serverID];
		$requestURL = sprintf("%s%s",$randomServerName , "g/?title=" . urlencode($title));
		//var_dump($requestURL);
		//header("Content-Type: application/json");
		//$json = file_get_contents($requestURL);
		$json =$this->my_file_get_contents($requestURL);
		//var_dump($json);
		//die;
		if($json && count($json)>=1){
			print $json;
		}else{  
			print "[]";
		}
		$this->updateTimestamp($serverID);
	}
	public function updateTimestamp($nodeID){
		$now = time('NOW') . "\n";
		for($i=0;$i<count($this->fileContent);$i++){
			if($i == $nodeID){
				$this->fileContent[$nodeID] = $now;
			}
		}
		$newContent = "";
		foreach ($this->fileContent as $line){
			$newContent = $newContent .  $line;
		}
		file_put_contents("./nodes.txt", $newContent);
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
	public function my_file_get_contents($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$headers = [
		    'Content-Type: application/json'
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$server_output = curl_exec ($ch);

		curl_close ($ch);

		return  $server_output ;
	//return "{}";
	
/* 		$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($ch);
	curl_close($ch);
 */	// Create phpQuery document with returned HTML
	//return $html;
	}
}
$nc = new nodeChooser();
$nc->request();