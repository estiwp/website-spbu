<?php require_once('Connections/koneksi.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO komentar (Nama, Email, Komentar) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Komentar'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "beranda.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO komentar (Nama, Email, Komentar) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Komentar'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "beranda.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_komentar = 3;
$pageNum_komentar = 0;
if (isset($_GET['pageNum_komentar'])) {
  $pageNum_komentar = $_GET['pageNum_komentar'];
}
$startRow_komentar = $pageNum_komentar * $maxRows_komentar;

mysql_select_db($database_koneksi, $koneksi);
$query_komentar = "SELECT * FROM komentar";
$query_limit_komentar = sprintf("%s LIMIT %d, %d", $query_komentar, $startRow_komentar, $maxRows_komentar);
$komentar = mysql_query($query_limit_komentar, $koneksi) or die(mysql_error());
$row_komentar = mysql_fetch_assoc($komentar);

if (isset($_GET['totalRows_komentar'])) {
  $totalRows_komentar = $_GET['totalRows_komentar'];
} else {
  $all_komentar = mysql_query($query_komentar);
  $totalRows_komentar = mysql_num_rows($all_komentar);
}
$totalPages_komentar = ceil($totalRows_komentar/$maxRows_komentar)-1;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Page</title>
<meta name="generator" content="90 Second Website Builder 9 Trial Version - http://www.90secondwebsitebuilder.com">
<style type="text/css">
div#container
{
   width: 800px;
   position: relative;
   margin-top: 0px;
   margin-left: auto;
   margin-right: auto;
   text-align: left;
}
body
{
   background-color: #EEEEEE;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   margin: 0;
   text-align: center;
}
</style>
<style type="text/css">
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type="text/css">
#wb_CssMenu1
{
   border: 0px #DCDCDC solid;
   background-color: transparent;
}
#wb_CssMenu1 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu1 li
{
   float: left;
   margin: 0;
   padding: 0px 0px 0px 0px;
   width: 115px;
}
#wb_CssMenu1 a
{
   display: block;
   float: left;
   color: #FFFFFF;
   border: 0px #C0C0C0 solid;
   background-color: #DC143C;
   background: -moz-linear-gradient(bottom,#DC143C 0%,#F4F3F3 100%);
   background: -webkit-linear-gradient(bottom,#DC143C 0%,#F4F3F3 100%);
   background: -o-linear-gradient(bottom,#DC143C 0%,#F4F3F3 100%);
   background: -ms-linear-gradient(bottom,#DC143C 0%,#F4F3F3 100%);
   background: linear-gradient(bottom,#DC143C 0%,#F4F3F3 100%);
   font-family: Arial;
   font-size: 15px;
   font-weight: bold;
   font-style: normal;
   text-decoration: none;
   width: 105px;
   height: 70px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 70px;
   text-align: center;
}
#wb_CssMenu1 li:hover a, #wb_CssMenu1 a:hover, #wb_CssMenu1 .active
{
   color: #FFFFFF;
   background-color: #000000;
   background: -moz-linear-gradient(bottom,#000000 0%,#EEEEEE 100%);
   background: -webkit-linear-gradient(bottom,#000000 0%,#EEEEEE 100%);
   background: -o-linear-gradient(bottom,#000000 0%,#EEEEEE 100%);
   background: -ms-linear-gradient(bottom,#000000 0%,#EEEEEE 100%);
   background: linear-gradient(bottom,#000000 0%,#EEEEEE 100%);
   border: 0px #C0C0C0 solid;
}
#wb_CssMenu1 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu1 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu1 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0px;
}
#wb_Text6 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text6 div
{
   text-align: left;
}
#Layer4
{
   background-color: #000066;
   background: -moz-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -webkit-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -o-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -ms-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
}
#wb_Text11 
{
	background-color: transparent;
	border: 0px #000000 solid;
	padding: 0;
	text-align: center;
	visibility: inherit;
}
#wb_Text11 div
{
   text-align: center;
}
#Image2
{
   border: 1px #FFFFFF solid;
}
#wb_Text7 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text7 div
{
   text-align: left;
   white-space: nowrap;
}
#wb_CssMenu2
{
   border: 0px #DCDCDC solid;
   background-color: transparent;
}
#wb_CssMenu2 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu2 li
{
   float: left;
   margin: 0;
   padding: 0px 0px 0px 0px;
   width: 80px;
}
#wb_CssMenu2 a
{
   display: block;
   float: left;
   color: #000000;
   border: 0px #C0C0C0 solid;
   background-color: #D3D3D3;
   background: -moz-linear-gradient(bottom,#D3D3D3 0%,#F4F3F3 100%);
   background: -webkit-linear-gradient(bottom,#D3D3D3 0%,#F4F3F3 100%);
   background: -o-linear-gradient(bottom,#D3D3D3 0%,#F4F3F3 100%);
   background: -ms-linear-gradient(bottom,#D3D3D3 0%,#F4F3F3 100%);
   background: linear-gradient(bottom,#D3D3D3 0%,#F4F3F3 100%);
   font-family: Arial;
   font-size: 15px;
   font-weight: bold;
   font-style: normal;
   text-decoration: none;
   width: 70px;
   height: 50px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 50px;
   text-align: center;
}
#wb_CssMenu2 li:hover a, #wb_CssMenu2 a:hover, #wb_CssMenu2 .active
{
   color: #000000;
   background-color: #F5F5F5;
   background: -moz-linear-gradient(bottom,#F5F5F5 0%,#EEEEEE 100%);
   background: -webkit-linear-gradient(bottom,#F5F5F5 0%,#EEEEEE 100%);
   background: -o-linear-gradient(bottom,#F5F5F5 0%,#EEEEEE 100%);
   background: -ms-linear-gradient(bottom,#F5F5F5 0%,#EEEEEE 100%);
   background: linear-gradient(bottom,#F5F5F5 0%,#EEEEEE 100%);
   border: 0px #C0C0C0 solid;
}
#wb_CssMenu2 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu2 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu2 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0px;
}
#wb_Text13 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: justify;
}
#wb_Text13 div
{
   text-align: justify;
   white-space: normal;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text3 div
{
   text-align: left;
}
#wb_Text4 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: justify;
}
#wb_Text4 div
{
   text-align: justify;
   white-space: normal;
}
#wb_Text5 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text5 div
{
   text-align: left;
}
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text1 div
{
   text-align: left;
   white-space: nowrap;
}
#Image6
{
   border: 1px #FFFFFF solid;
}
#wb_Text10 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text10 div
{
   text-align: left;
   white-space: nowrap;
}
#wb_Text12 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: justify;
}
#wb_Text12 div
{
   text-align: justify;
   white-space: normal;
}
#wb_Text8 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text8 div
{
   text-align: left;
}
#wb_Text9 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text9 div
{
   text-align: left;
}
#wb_Text14 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text14 div
{
   text-align: left;
   white-space: nowrap;
}
.style4 {
	font-size: 12px;
	font-weight: bold;
}
.style6 {
	font-size: 13px;
	font-family: Arial, Helvetica, sans-serif;
}
.style8 {font-size: 18px}
</style>
</head>
<body>
<div id="container">
<div id="wb_Shape6" style="position:absolute; left:0px; top:381px; width:551px; height:255px; z-index:2; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div align="center"></div>
</div>
<div id="wb_Shape2" style="position:absolute; left:575px; top:507px; width:212px; height:72px; z-index:3; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"></div>
<div id="wb_CssMenu1" style="position:absolute;left:225px;top:0px;width:575px;height:70px;z-index:4;">
<ul>
<li class="firstmain"><a class="active" href="beranda awal.php" target="_self">SPBU</a></li>
<li><a href="#" target="_self">Hotel</a>
</li>
<li><a href="#" target="_self">Sport&nbsp;Centre</a>
</li>
<li><a href="#" target="_self">Kuliner</a>
</li>
<li><a href="#" target="_self">Bengkel</a>
</li>
</ul>
<br>
</div>
<div id="wb_Layer7" style="position:absolute;left:0px;top:69px;width:778px;height:262px;z-index:5;">
<img src="New folder (4)/images/img0001.gif" alt="" name="Layer7" width="878" id="Layer7" style="border-width:0;width:800px;height:262px;"></div>

<div id="wb_Text6" style="position:absolute;left:9px;top:14px;width:269px;height:37px;z-index:7;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:29px;"><strong>Asik Surabaya</strong></span></div>
<div id="wb_Shape5" style="position:absolute; left:575px; top:416px; width:212px; height:78px; z-index:8; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"></div>
<div id="wb_Image2" style="position:absolute;left:582px;top:428px;width:74px;height:51px;z-index:9;">
<img src="images/51.601.77.PNG" alt="" name="Image2" width="1010" height="541" id="Image2" style="width:74px;height:51px;"></div>
<div id="wb_Text7" style="position:absolute;left:667px;top:427px;width:122px;height:54px;z-index:10;text-align:left;">
<div style="position:absolute;left:0px;top:0px;width:122px;height:18px;"><a href="#">SPBU 5160177</a></div>
<div style="position:absolute;left:0px;top:18px;width:122px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;">Lokasi : Jl. Dr. So.. </span></div>
</div>
<div id="wb_CssMenu2" style="position:absolute;left:0px;top:331px;width:217px;height:55px;z-index:11;">
<ul>
<li class="firstmain"><a class="active" href="New folder (4)/index.html" target="_self">Beranda</a>
</li>
<li><a href="#" target="_self">Pencarian</a>
</li>
</ul>
<br>
</div>
<div id="wb_Text13" style="position:absolute;left:18px;top:115px;width:323px;height:65px;text-align:justify;z-index:12;">
<div style="position:absolute;left:0px;top:0px;width:323px;height:29px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:24px;">Sistem Informasi SPBU</span></div>
<div style="position:absolute;left:0px;top:29px;width:323px;height:18px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:13px;"><br></span></div>
<div style="position:absolute;left:0px;top:47px;width:323px;height:29px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:13px;">Deskripsi </span></div>
</div>
<div id="wb_Text3" style="position:absolute;left:575px;top:381px;width:194px;height:24px;z-index:13;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:19px;"><strong>SPBU Populer</strong></span></div>
<div id="wb_Shape1" style="position:absolute;left:575px;top:652px;width:216px;height:37px;z-index:14;">
  <table border="1">
    <tr>
      <td>Nama</td>
      <td>Komentar</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_komentar['Nama']; ?></td>
        <td><?php echo $row_komentar['Komentar']; ?></td>
      </tr>
      <?php } while ($row_komentar = mysql_fetch_assoc($komentar)); ?>
  </table>
</div>
<div id="wb_Text5" style="position:absolute;left:575px;top:614px;width:194px;height:24px;z-index:16;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:19px;"><strong>Komentar Terakhir</strong></span></div>
<div class="style4" id="wb_Text1" style="position:absolute;left:355px;top:397px;width:188px;height:56px;z-index:17;text-align:left;">
  <form name="form3" method="post" action="">
    <p class="style8"><span style="color:#000000;font-family:'Trebuchet MS';">No SPBU  : </span>5160165</p>
    <p>Lokasi : Jl. Raya Jemursari No.120-125 Tenggilis Mejoyo</p>
    <p>Fasilitas : ATM Center</p>
    <p>Produk yang dijual : Premium, Solar, Bio Solar, Pertamax, Pertamax Plus, Dex</p>
    <p>Jam Operasional : 24 Jam </p>
  </form>

  <div style="position:absolute;left:-342px;top:-1px;width:315px;height:224px;">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.301041088988!2d112.74652300000002!3d-7.3200420000000035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb110cd68fa1%3A0x65a82045a0aea4a1!2sPertamina+SPBU+51.601.65!5e0!3m2!1sid!2s!4v1427616523144" width="300" height="220" frameborder="0" style="border:0"></iframe></div>
</div>
<div id="wb_Image6" style="position:absolute;left:581px;top:516px;width:74px;height:51px;z-index:18;"><img src="images/51.601.66.PNG" alt="" name="Image6" width="469" height="584" id="Image6" style="width:74px;height:51px;"></div>
<div id="wb_Text10" style="position:absolute;left:666px;top:516px;width:119px;height:54px;z-index:19;text-align:left;">
<div style="position:absolute;left:0px;top:0px;width:119px;height:18px;"><span class="style6"><a href="#">SPBU 5160166</a></span></div>
<div style="position:absolute;left:0px;top:18px;width:119px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;">Lokasi : Jl. Raya Du..</span></div>
</div>
<div id="wb_Shape7" style="position:absolute; left:0px; top:656px; width:550px; height:172px; z-index:22; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div style="position:absolute;left:23px;top:35px;width:140px;height:137px;">
    <p align="center"><img src="images/13-spbu.jpg" width="100" height="90"></p>
    <p align="center"><a href="#">SPBU 5460141</a></p>
  </div>
  <div style="position:absolute;left:381px;top:34px;width:140px;height:138px;">
    <p align="center"><img src="images/17a_1_4-Photo.jpg" width="100" height="90"></p>
    <p align="center"><a href="#">SPBU 5460132</a></p>
  </div>
   <div style="position:absolute;left:200px;top:34px;width:140px;height:140px;">
    <p align="center"><img src="images/SPBU.jpg" width="100" height="90"></p>
    <p align="center"><a href="#">SPBU 5460183</a></p>
</div>
<div id="wb_Text8" style="position:absolute;left:22px;top:11px;width:279px;height:22px;z-index:23;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:16px;"><strong>SPBU yang direkomendasikan</strong></span></div>
<div id="wb_Shape8" style="position:absolute; left:-1px; top:203px; width:552px; height:224px; z-index:24; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div style="position:absolute;left:28px;top:54px;width:190px;height:142px;">
    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right"><div align="left">Nama:</div></td>
          <td><input type="text" name="Nama" value="" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right"><div align="left">Email:</div></td>
          <td><input type="text" name="Email" value="" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Komentar:</td>
          <td><textarea name="Komentar" cols="52" rows="4"></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input type="submit" value="Kirim"></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form2">
    </form>
    <p>&nbsp;</p>
  </div>
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</div>
<div id="wb_Text9" style="position:absolute;left:30px;top:221px;width:279px;height:22px;z-index:25;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:16px;"><strong>Komentar</strong></span></div>
</div>
<div id="Layer4" style="position:absolute;text-align:center;left:-300px;top:1414px;width:1373px;height:55px;z-index:27;" title="">
<div id="Layer4_Container" style="width:100%; position:relative; margin-left:auto; margin-right:auto; text-align:left; z-index: 34; left: 0;">
<div id="wb_Text11" style="position:absolute;left:300px;top:22px;width:780px;height:16px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:11px;">Copyright © 2015 by &quot;Esti Widyapraba&quot;&nbsp; ·&nbsp; All Rights reserved&nbsp;</span></div>
<a href="http://www.90secondwebsitebuilder.com" target="_blank"></a></div>
</div>
</body>
</html>
<?php
mysql_free_result($komentar);
?>