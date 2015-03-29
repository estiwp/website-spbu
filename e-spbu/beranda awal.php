<?php require_once('Connections/koneksi.php'); ?>
<?php
$maxRows_komen = 3;
$pageNum_komen = 0;
if (isset($_GET['pageNum_komen'])) {
  $pageNum_komen = $_GET['pageNum_komen'];
}
$startRow_komen = $pageNum_komen * $maxRows_komen;

mysql_select_db($database_koneksi, $koneksi);
$query_komen = "SELECT * FROM komentar";
$query_limit_komen = sprintf("%s LIMIT %d, %d", $query_komen, $startRow_komen, $maxRows_komen);
$komen = mysql_query($query_limit_komen, $koneksi) or die(mysql_error());
$row_komen = mysql_fetch_assoc($komen);

if (isset($_GET['totalRows_komen'])) {
  $totalRows_komen = $_GET['totalRows_komen'];
} else {
  $all_komen = mysql_query($query_komen);
  $totalRows_komen = mysql_num_rows($all_komen);
}
$totalPages_komen = ceil($totalRows_komen/$maxRows_komen)-1;
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
   background-color: #0B497C;
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
}
#wb_Text11 div
{
   text-align: center;
}
#Image2
{
   border: 1px #FFFFFF solid;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text2 div
{
   text-align: left;
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
   white-space: nowrap;
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
   white-space: nowrap;
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
#Image1
{
   border: 1px #FFFFFF solid;
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
#Image3
{
   border: 1px #FFFFFF solid;
}
#Image4
{
   border: 1px #FFFFFF solid;
}
#Button1
{
   border: 1px #A9A9A9 solid;
   background-color: #F0F0F0;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Button2
{
   border: 1px #A9A9A9 solid;
   background-color: #F0F0F0;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Button3
{
   border: 1px #A9A9A9 solid;
   background-color: #F0F0F0;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Image5
{
   border: 1px #FFFFFF solid;
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
.style1 {
	font-family: 'Trebuchet MS';
	font-size: 16px;
	font-weight: bold;
}
.style2 {
	font-family: 'Trebuchet MS';
	font-size: 12px;
}
.style4 {font-family: 'Trebuchet MS'; font-size: 12px; font-weight: bold; }
.style5 {font-family: 'Trebuchet MS'; font-size: 12px; color: #000000; }
</style>
<script type="text/javascript" src="New folder (3)/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="New folder (3)/wb.carousel.min.js"></script>
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
<a href="http://www.90secondwebsitebuilder.com" target="_blank"></a>
<div id="wb_Shape2" style="position:absolute;left:575px;top:793px;width:212px;height:72px;z-index:4;">
<img src="New folder (3)/images/img0001.gif" id="Shape2" alt="" style="border-width:0;width:212px;height:72px;"></div>
<div id="wb_CssMenu1" style="position:absolute;left:225px;top:0px;width:575px;height:70px;z-index:5;">
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
<div id="wb_Layer7" style="position:absolute;left:0px;top:69px;width:800px;height:262px;z-index:6;">
<img src="New folder (3)/images/img0002.gif" id="Layer7" alt="" style="border-width:0;width:800px;height:262px;"></div>

<div id="wb_Text6" style="position:absolute;left:9px;top:14px;width:269px;height:37px;z-index:8;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:29px;"><strong>Asik Surabaya</strong></span></div>
<div id="wb_Shape5" style="position:absolute;left:575px;top:709px;width:212px;height:72px;z-index:9;">
<img src="New folder (3)/images/img0003.gif" id="Shape5" alt="" style="border-width:0;width:212px;height:72px;"></div>
<div id="wb_Shape4" style="position:absolute;left:0px;top:380px;width:800px;height:263px;z-index:10;">
<img src="New folder (3)/images/img0004.gif" id="Shape4" alt="" style="border-width:0;width:800px;height:263px;"></div>
<div id="wb_Image2" style="position:absolute;left:581px;top:719px;width:74px;height:54px;z-index:11;">
<img src="images/51.601.77.PNG" alt="" name="Image2" width="1010" height="541" id="Image2" style="width:74px;height:51px;"></div>
<div id="wb_Text2" style="position:absolute;left:12px;top:664px;width:214px;height:37px;z-index:12;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:29px;"><strong>Daftar SPBU</strong></span></div>
<div id="wb_Text7" style="position:absolute;left:668px;top:718px;width:118px;height:54px;z-index:13;text-align:left;">
<div style="position:absolute;left:0px;top:0px;width:118px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;"><a href="#">SPBU 5160177</a></span></div>
<div style="position:absolute;left:0px;top:18px;width:118px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;">Lokasi : Jl. Dr. So..</span></div>
</div>
<div id="wb_Text8" style="position:absolute;left:289px;top:864px;width:244px;height:56px;z-index:14;text-align:left;">
<div class="style1" style="position:absolute;left:0px;top:0px;width:244px;height:18px;"><span style="color:#000000;">No :</span> 51.601.77 </div>
<div style="position:absolute;left:0px;top:25px;width:244px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;"><strong>Lokasi : Jl. Dr. Soetomo No. 87 &ndash; 89</strong></span></div>
<div class="style4" style="position:absolute;left:0px;top:46px;width:244px;height:29px;"><span style="color:#000000;">Fasilitas :</span>  Bright Store, ATM Center</div>
</div>
<div id="wb_Text9" style="position:absolute;left:289px;top:1009px;width:244px;height:56px;z-index:15;text-align:left;">
<div style="position:absolute;left:0px;top:0px;width:244px;height:18px;"><span class="style1" style="position:absolute;left:0px;top:0px;width:244px;height:18px;"><span style="color:#000000;">No :</span> 51.601.66</span></div>
<div class="style4" style="position:absolute;left:0px;top:22px;width:244px;height:18px;"><span style="color:#000000;">Lokasi :</span> Jl. Dupak No. 15, Ps Turi</div>
<div class="style4" style="position:absolute;left:0px;top:44px;width:244px;height:29px;"><span style="color:#000000;">Fasilitas :</span> 
  Bright Store
    <form name="form2" method="post" action="">
  </form>
  </div>
</div>
<div id="wb_Carousel1" style="position:absolute;left:0px;top:380px;width:799px;height:263px;z-index:16;overflow:hidden">
<div id="Carousel1" style="position:absolute; background-image: url(images/SPBU.jpg); layer-background-image: url(images/SPBU.jpg); border: 1px none #000000;">
<div class="frame">
<div id="wb_Image1" style="position:absolute;left:0px;top:1px;width:798px;height:260px;z-index:2;">
<img src="images/Picture1.jpg" alt="" name="Image1" width="1690" height="566" id="Image1" style="width:798px;height:260px;"></div>
</div>
<div class="frame">
</div>
<div class="frame">
</div>
</div>
<div id="Carousel1_back" style="position:absolute;left:4px;top:116px;width:30px;height:30px;z-index:999"><a style="cursor:pointer"><img alt="Back" style="border-style:none" src="New folder (3)/images/carousel_back.png"></a></div>
<div id="Carousel1_next" style="position:absolute;left:765px;top:116px;width:30px;height:30px;z-index:999"><a style="cursor:pointer"><img alt="Next" style="border-style:none" src="New folder (3)/images/carousel_next.png"></a></div>
</div>
<div id="wb_CssMenu2" style="position:absolute;left:0px;top:331px;width:263px;height:50px;z-index:17;">
<ul>
<li class="firstmain"><a class="active" href="beranda awal.php" target="_self">Beranda</a></li>
<li><a href="cari.php" target="_self">Pencarian</a></li>
</ul>
<br>
</div>
<div id="wb_Text13" style="position:absolute;left:18px;top:115px;width:323px;height:65px;text-align:justify;z-index:18;">
<div style="position:absolute;left:0px;top:0px;width:323px;height:29px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:24px;">Sistem Informasi SPBU</span></div>
<div style="position:absolute;left:0px;top:29px;width:323px;height:18px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:13px;"><br></span></div>
<div style="position:absolute;left:0px;top:47px;width:323px;height:29px;"><span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:13px;">Deskripsi </span></div>
</div>
<div id="wb_Text3" style="position:absolute;left:575px;top:670px;width:194px;height:24px;z-index:19;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:19px;"><strong>SPBU Populer</strong></span></div>
<div id="wb_Text4" style="position:absolute;left:596px;top:928px;width:169px;height:16px;text-align:justify;z-index:21;">
<div style="position:absolute;left:-21px;top:0px;width:218px;height:15px;">
  <table border="1">
    <tr>
      <td>Nama</td>
      <td>Komentar</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_komen['Nama']; ?></td>
        <td><?php echo $row_komen['Komentar']; ?></td>
      </tr>
      <?php } while ($row_komen = mysql_fetch_assoc($komen)); ?>
  </table>
</div>
</div>
<div id="wb_Text5" style="position:absolute;left:575px;top:880px;width:194px;height:24px;z-index:22;text-align:left;">
<span style="color:#05467E;font-family:'Trebuchet MS';font-size:19px;"><strong>Komentar Terakhir</strong></span></div>
<div id="wb_Image3" style="position:absolute;left:11px;top:856px;width:198px;height:117px;z-index:23;">
<img src="New folder (3)/images/cover.jpg" id="Image3" alt="" style="width:198px;height:117px;"></div>
<div id="wb_Image4" style="position:absolute;left:12px;top:1001px;width:198px;height:117px;z-index:24;">
<img src="New folder (3)/images/cover.jpg" id="Image4" alt="" style="width:198px;height:117px;"></div>
<div id="wb_Image5" style="position:absolute;left:11px;top:714px;width:198px;height:117px;z-index:28;">
<img src="images/51.601.65.PNG" alt="" name="Image5" width="1171" height="580" id="Image5" style="width:198px;height:117px;"></div>
<div id="wb_Text1" style="position:absolute;left:287px;top:722px;width:244px;height:56px;z-index:29;text-align:left;">
<div class="style1" style="position:absolute;left:0px;top:0px;width:244px;height:18px;"><span style="color:#000000;">No : </span>51.601.65</div>
<div style="position:absolute;left:0px;top:24px;width:244px;height:18px;"><strong><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;">Lokasi :</span> <span class="style2">Jl. Raya Jemursari</span></strong> <span class="style4">No.120-125</span></div>
<div class="style4" style="position:absolute;left:0px;top:47px;width:244px;height:29px;"><span style="color:#000000;">Fasilitas :</span> ATM Center </div>
</div>
<div id="wb_Image6" style="position:absolute;left:581px;top:800px;width:74px;height:51px;z-index:30;">
<img src="images/51.601.66.PNG" alt="" name="Image6" width="469" height="584" id="Image6" style="width:74px;height:51px;"></div>
<div id="wb_Text10" style="position:absolute;left:666px;top:801px;width:120px;height:54px;z-index:31;text-align:left;">
<div style="position:absolute;left:0px;top:0px;width:120px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;"><a href="#">SPBU 5160166</a></span></div>
<div style="position:absolute;left:0px;top:18px;width:120px;height:18px;"><span style="color:#000000;font-family:'Trebuchet MS';font-size:12px;">Lokasi : Jl. Raya Du.. </span></div>
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:center;left:0px;top:1227px;width:100%;height:55px;z-index:34;" title="">
<div id="Layer4_Container" style="width:800px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text11" style="position:absolute;left:7px;top:22px;width:780px;height:16px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:11px;">Copyright © 2015 by &quot;Esti Widyapraba &quot;&nbsp; ·&nbsp; All Rights reserved</span></div>
<a href="http://www.90secondwebsitebuilder.com" target="_blank"></a></div>
</div>
<div style="position:absolute;left:618px;top:811px;width:55px;height:29px;">
  <div class="style5" style="position:absolute;left:81px;top:0px;width:99px;height:18px;"><a href="beranda.php">Selengkapnya &gt;&gt; </a></div>
</div><a href="beranda.php"></a>
<div class="style5" style="position:absolute;left:699px;top:952px;width:99px;height:18px;"><a href="beranda.php">Selengkapnya &gt;&gt; </a></div>
<div class="style5" style="position:absolute;left:700px;top:1091px;width:99px;height:18px;"><a href="beranda.php">Selengkapnya &gt;&gt; </a></div>
</body>
</html>
<?php
mysql_free_result($komen);
?>