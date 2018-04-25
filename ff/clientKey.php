<?php
class k{
function getEncodedRandomKey(){
	$number= $this->randomNumber();
	$caclucatedNumber = (substr($number, 2, 8) * 313000) + 7102;
	return $number . $caclucatedNumber;
}
function randomNumber() {
    $length= 11;

    $number = mt_rand(1,9);
    for($i = 0; $i < $length; $i++) {
        $number .= mt_rand(0, 9);
    }

    return $number;
}
}
$kk = new k();
echo $kk->getEncodedRandomKey();