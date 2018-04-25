<!doctype html>
<html dir="rtl" lang="fa-IR" class="">
<head>
<?php //header('Location:https://t.me/joinchat/AAAAADz_3Qb7BDHV3ZZ9YQ/'); ?>
<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">

<title>+</title>
<link rel="stylesheet" media="all" href="style.css">


<script language="javascript" type="text/javascript">
<!--
/****************************************************
     Author: Eric King
     Url: http://redrival.com/eak/index.shtml
     This script is free to use as long as this info is left in
     Featured on Dynamic Drive script library (http://www.dynamicdrive.com)
****************************************************/
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
// -->
</script>
</head>

<body>

<script>

//Pop-under window- By JavaScript Kit
//Credit notice must stay intact for use
//Visit http://javascriptkit.com for this script

//specify page to pop-under
var popunder="https://t.me/joinchat/AAAAAEGyfLwjkhMGoD_d0g"

//specify popunder window features
//set 1 to enable a particular feature, 0 to disable
var winfeatures="width=800,height=510,scrollbars=1,resizable=1,toolbar=1,location=1,menubar=1,status=1,directories=0"

//Pop-under only once per browser session? (0=no, 1=yes)
//Specifying 0 will cause popunder to load every time page is loaded
var once_per_session=0

///No editing beyond here required/////

function get_cookie(Name) {
  var search = Name + "="
  var returnvalue = "";
  if (document.cookie.length > 0) {
    offset = document.cookie.indexOf(search)
    if (offset != -1) { // if cookie exists
      offset += search.length
      // set index of beginning of value
      end = document.cookie.indexOf(";", offset);
      // set index of end of cookie value
      if (end == -1)
         end = document.cookie.length;
      returnvalue=unescape(document.cookie.substring(offset, end))
      }
   }
  return returnvalue;
}

function loadornot(){
if (get_cookie('popunder')==''){
loadpopunder()
document.cookie="popunder=yes"
}
}

function loadpopunder(){
win2=window.open(popunder,"",winfeatures)
win2.blur()
window.focus()
}

if (once_per_session==0)
loadpopunder()
else
loadornot()

</script>


<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3518264,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>


</body></html>