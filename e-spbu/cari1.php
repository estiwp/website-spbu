<?php require_once('Connections/koneksi.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];
?>
<?php require_once('Connections/koneksi.php'); ?>
<?php require_once('Connections/koneksi.php'); ?>
<?php
$maxRows_tampill = 10;
$pageNum_tampill = 0;
if (isset($_GET['pageNum_tampill'])) {
  $pageNum_tampill = $_GET['pageNum_tampill'];
}
$startRow_tampill = $pageNum_tampill * $maxRows_tampill;

mysql_select_db($database_koneksi, $koneksi);
$query_tampill = "SELECT * FROM pencarian ORDER BY `No` ASC";
$query_limit_tampill = sprintf("%s LIMIT %d, %d", $query_tampill, $startRow_tampill, $maxRows_tampill);
$tampill = mysql_query($query_limit_tampill, $koneksi) or die(mysql_error());
$row_tampill = mysql_fetch_assoc($tampill);

if (isset($_GET['totalRows_tampill'])) {
  $totalRows_tampill = $_GET['totalRows_tampill'];
} else {
  $all_tampill = mysql_query($query_tampill);
  $totalRows_tampill = mysql_num_rows($all_tampill);
}
$totalPages_tampill = ceil($totalRows_tampill/$maxRows_tampill)-1;

mysql_select_db($database_koneksi, $koneksi);
$query_tampil = "SELECT * FROM pencarian ORDER BY `No` ASC";
$tampil = mysql_query($query_tampil, $koneksi) or die(mysql_error());
$row_tampil = mysql_fetch_assoc($tampil);
$totalRows_tampil = mysql_num_rows($tampil);

$colname_cari = "-1";
if (isset($_POST['txt_search'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['txt_search'] : addslashes($_POST['txt_search']);
}
mysql_select_db($database_koneksi, $koneksi);
$query_cari = sprintf("SELECT * FROM pencarian WHERE Lokasi = '%s'", $colname_cari);
$cari = mysql_query($query_cari, $koneksi) or die(mysql_error());
$row_cari = mysql_fetch_assoc($cari);
$totalRows_cari = mysql_num_rows($cari);

$maxRows_cari = 10;
$pageNum_cari = 0;
if (isset($_GET['pageNum_cari'])) {
  $pageNum_cari = $_GET['pageNum_cari'];
}
$startRow_cari = $pageNum_cari * $maxRows_cari;

$colname_cari = "-1";

mysql_select_db($database_koneksi, $koneksi);

if (isset($_POST['txt_search'])) 
{
  	$text = $_POST['txt_search'] ;
	$query_cari = "SELECT * FROM pencarian WHERE Lokasi LIKE '%".$text."%'";
}
else
{
	$query_cari = "SELECT * FROM pencarian"; 
}

$query_limit_cari = sprintf("%s LIMIT %d, %d", $query_cari, $startRow_cari, $maxRows_cari);
$cari = mysql_query($query_limit_cari, $koneksi) or die(mysql_error());
$row_cari = mysql_fetch_assoc($cari);

if (isset($_GET['totalRows_cari'])) {
  $totalRows_cari = $_GET['totalRows_cari'];
} else {
  $all_cari = mysql_query($query_cari);
  $totalRows_cari = mysql_num_rows($all_cari);
}
$totalPages_cari = ceil($totalRows_cari/$maxRows_cari)-1;

$queryString_cari = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_cari") == false && 
        stristr($param, "totalRows_cari") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_cari = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_cari = sprintf("&totalRows_cari=%d%s", $totalRows_cari, $queryString_cari);
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
#wb_Text11 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: center;
}
#wb_Text11 div
{
   text-align: center;
}
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
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: justify;
}
#wb_Text3 div
{
   text-align: justify;
   white-space: normal;
}
#Image1
{
   border: 1px #FFFFFF solid;
}
#wb_Carousel1
{
   background-color: transparent;
}
#Carousel1 .frame
{
   width: 799px;
   display: inline-block;
   float: left;
   height: 263px;
}
#wb_Carousel1 .pagination
{
   bottom: 0;
   left: 0;
   position: absolute;
   text-align: center;
   vertical-align: middle;
   width: 799px;
   z-index: 999;
}
#wb_Carousel1 .pagination img
{
   border-style: none;
   padding: 12px 12px 12px 12px;
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
#Layer4
{
   background-color: #0B497C;
   background: -moz-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -webkit-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -o-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -ms-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
}
#Layer1
{
   background-color: #0B497C;
   background: -moz-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -webkit-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -o-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: -ms-linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
   background: linear-gradient(bottom,#0B497C 0%,#1F5788 100%);
}
.style3 {font-size: large}
</style>
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="wb.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   var Carousel1Opts =
   {
      delay: 3000,
      duration: 500,
      easing: 'linear',
      mode: 'forward',
      direction: '',
      pagination: true,
      pagination_img_default: 'images/page_default.png',
      pagination_img_active: 'images/page_active.png',
      start: 0,
      width: 799
   };
   $("#Carousel1").carousel(Carousel1Opts);
   $("#Carousel1_back a").click(function()
   {
      $('#Carousel1').carousel('prev');
   });
   $("#Carousel1_next a").click(function()
   {
      $('#Carousel1').carousel('next');
   });
});
</script>
</head>
<body>
<div id="container">
<div id="wb_Shape1" style="position:absolute;left:0px;top:381px;width:800px;height:262px;z-index:4;">
<img src="images/img0001.gif" id="Shape1" alt="" style="border-width:0;width:800px;height:262px;"></div>

<div id="wb_Text6" style="position:absolute;left:9px;top:14px;width:269px;height:37px;z-index:6;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:29px;"><strong>Asik Surabaya</strong></span></div>
<div id="wb_CssMenu1" style="position:absolute;left:225px;top:0px;width:575px;height:70px;z-index:7;">
<ul>
<li class="firstmain"><a class="active" href="./index.html" target="_self">SPBU</a>
</li>
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
<div id="wb_Shape4" style="position:absolute;left:0px;top:70px;width:800px;height:262px;z-index:8;">
<img src="images/img0002.gif" id="Shape4" alt="" style="border-width:0;width:800px;height:262px;"></div>
<div id="wb_Text3" style="position:absolute;left:32px;top:121px;width:323px;height:65px;text-align:justify;z-index:9;">
<div style="position:absolute;left:0px;top:0px;width:323px;height:29px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:24px;">Sistem Informasi SPBU</span></div>
<div style="position:absolute;left:0px;top:29px;width:323px;height:18px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:13px;"><br></span></div>
<div style="position:absolute;left:0px;top:47px;width:323px;height:29px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:13px;">Deskripsi </span></div>
</div>
<div id="wb_Carousel1" style="position:absolute;left:1px;top:379px;width:799px;height:263px;z-index:10;overflow:hidden">
<div id="Carousel1" style="position:absolute">
<div class="frame">
<div id="wb_Image1" style="position:absolute;left:460px;top:34px;width:250px;height:188px;z-index:0;">
<img src="images/wwb_bridge.png" id="Image1" alt="" style="width:250px;height:188px;"></div>
</div>
<div class="frame">
</div>
<div class="frame">
</div>
</div>
<div id="Carousel1_back" style="position:absolute;left:4px;top:116px;width:30px;height:30px;z-index:999"><a style="cursor:pointer"><img alt="Back" style="border-style:none" src="images/carousel_back.png"></a></div>
<div id="Carousel1_next" style="position:absolute;left:765px;top:116px;width:30px;height:30px;z-index:999"><a style="cursor:pointer"><img alt="Next" style="border-style:none" src="images/carousel_next.png"></a></div>
</div>
<div id="wb_CssMenu2" style="position:absolute;left:0px;top:331px;width:219px;height:50px;z-index:11;">
<ul>
<li class="firstmain"><a class="active" href="./index.html" target="_self">Beranda</a>
</li>
<li><a href="#" target="_self">Pencarian</a>
</li>
</ul>
<br>
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:center;left:0px;top:1713px;width:100%;height:55px;z-index:12;" title="">
<div id="Layer4_Container" style="width:800px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<a href="http://www.90secondwebsitebuilder.com" target="_blank"></a>
<div id="wb_Text11" style="position:absolute;left:7px;top:22px;width:780px;height:16px;text-align:center;z-index:2;">
<span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:11px;">Copyright © 2013 by &quot;Your Name&quot;&nbsp; ·&nbsp; All Rights reserved&nbsp; ·&nbsp; E-Mail: yourname@domain.com</span></div>
</div>
</div>
<div style="position:absolute; text-align:center; left:150px; top:672px; width:799px; height:378px; z-index:13; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000;" title="">
<div id="Layer1_Container" style="width:800px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<a href="http://www.90secondwebsitebuilder.com" target="_blank"></a></div>

<div class="indent1">
									<h3 align="center">Welcome to Our Company!</h3>
									<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
									  <div align="left">
									    <blockquote>
									      <p>&nbsp;</p>
									      <form name="form1" method="post" action="">
Search
  <input name="txt_search" type="text" id="txt_search">
  <input name="btn_search" type="submit" id="btn_search" value="Submit">
</form>
									      <p>&nbsp;</p>
									    
                                          <table border="1">
                                            <tr>
                                              <td>No</td>
                                              <td>Lokasi</td>
                                              <td>Fasilitas</td>
                                              <td>Jam Operasional</td>
                                              <td>Jenis Produk</td>
                                            </tr>
                                            <?php do { ?>
                                              <tr>
                                                <td><?php echo $row_cari['No']; ?></td>
                                                <td><?php echo $row_cari['Lokasi']; ?></td>
                                                <td><?php echo $row_cari['Fasilitas']; ?></td>
                                                <td><?php echo $row_cari['Jam Operasional']; ?></td>
                                                <td><?php echo $row_cari['Jenis Produk']; ?></td>
                                              </tr>
                                              <?php } while ($row_cari = mysql_fetch_assoc($cari)); ?>
    </table>
                                          <p>
                                          <table border="0" width="50%" align="center">
                                            <tr>
                                              <td align="center"><a href="cari.php">Show All</a>
<?php if ($pageNum_cari > 0) { // Show if not first page ?>
                                                    <a href="<?php printf("%s?pageNum_cari=%d%s", $currentPage, 0, $queryString_cari); ?>"> First</a>
                                                    <?php } // Show if not first page ?>
                                                <?php if ($pageNum_cari > 0) { // Show if not first page ?>
                                                    <a href="<?php printf("%s?pageNum_cari=%d%s", $currentPage, max(0, $pageNum_cari - 1), $queryString_cari); ?>">Previous</a>
                                                    <?php } // Show if not first page ?>                                              <?php if ($pageNum_cari < $totalPages_cari) { // Show if not last page ?>
                                                    <a href="<?php printf("%s?pageNum_cari=%d%s", $currentPage, min($totalPages_cari, $pageNum_cari + 1), $queryString_cari); ?>">Next</a>
                                                    <?php } // Show if not last page ?>                                              <?php if ($pageNum_cari < $totalPages_cari) { // Show if not last page ?>
                                                    <a href="<?php printf("%s?pageNum_cari=%d%s", $currentPage, $totalPages_cari, $queryString_cari); ?>">Last</a>
                                                    <?php } // Show if not last page ?>
Total Record: <?php echo $totalRows_cari ?> </td>
                                            </tr>
                                          </table>
                                          </p>
</div>
									  <blockquote>&nbsp;</blockquote>
	</form>		
</div>
</div>



</body>
</html>
<?php
mysql_free_result($tampill);

mysql_free_result($tampil);

mysql_free_result($cari);
?>