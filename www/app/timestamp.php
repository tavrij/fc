<?php 
$file = fopen('./nodes.txt','w');
$maxnd = 7;
for($i=0;$i<$maxnd-1;$i++){
	fwrite($file, time("NOW") . "\n");
	echo (time("NOW") . "\n");
}
fwrite($file, time("NOW"));
echo time("NOW");
fclose($file);

echo "Compleated.";