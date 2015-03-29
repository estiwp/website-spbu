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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO pencarian (`No`, Lokasi, Fasilitas) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['No'], "int"),
                       GetSQLValueString($_POST['Lokasi'], "text"),
                       GetSQLValueString($_POST['Fasilitas'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO pencarian (`No`, Lokasi, Fasilitas, `Jam Operasional`, `Jenis Produk`) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['No'], "int"),
                       GetSQLValueString($_POST['Lokasi'], "text"),
                       GetSQLValueString($_POST['Fasilitas'], "text"),
                       GetSQLValueString($_POST['Jam_Operasional'], "text"),
                       GetSQLValueString($_POST['Jenis_Produk'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form4")) {
  $insertSQL = sprintf("INSERT INTO pencarian (`No`, Lokasi, Fasilitas, `Jam Operasional`, `Jenis Produk`) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['No'], "int"),
                       GetSQLValueString($_POST['Lokasi'], "text"),
                       GetSQLValueString($_POST['Fasilitas'], "text"),
                       GetSQLValueString($_POST['Jam_Operasional'], "text"),
                       GetSQLValueString($_POST['Jenis_Produk'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
}

$maxRows_tampil_adm = 10;
$pageNum_tampil_adm = 0;
if (isset($_GET['pageNum_tampil_adm'])) {
  $pageNum_tampil_adm = $_GET['pageNum_tampil_adm'];
}
$startRow_tampil_adm = $pageNum_tampil_adm * $maxRows_tampil_adm;

mysql_select_db($database_koneksi, $koneksi);
$query_tampil_adm = "SELECT * FROM pencarian ORDER BY `No` ASC";
$query_limit_tampil_adm = sprintf("%s LIMIT %d, %d", $query_tampil_adm, $startRow_tampil_adm, $maxRows_tampil_adm);
$tampil_adm = mysql_query($query_limit_tampil_adm, $koneksi) or die(mysql_error());
$row_tampil_adm = mysql_fetch_assoc($tampil_adm);

if (isset($_GET['totalRows_tampil_adm'])) {
  $totalRows_tampil_adm = $_GET['totalRows_tampil_adm'];
} else {
  $all_tampil_adm = mysql_query($query_tampil_adm);
  $totalRows_tampil_adm = mysql_num_rows($all_tampil_adm);
}
$totalPages_tampil_adm = ceil($totalRows_tampil_adm/$maxRows_tampil_adm)-1;
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
.style1 {font-size: large}
.style2 {font-size: xx-large; }
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
<div id="wb_CssMenu2" style="position:absolute;left:-1px;top:334px;width:160px;height:50px;z-index:11;">
<ul>
<li class="firstmain"><a class="active" href="./index.html" target="_self">Posting</a>
</li>
<li><a href="#" target="_self">Edit</a></li>
</ul>
<br>
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:center;left:4px;top:700px;width:100%;height:55px;z-index:12;" title="">
<div id="Layer4_Container" style="width:800px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<a href="http://www.90secondwebsitebuilder.com" target="_blank"></a>
<div id="wb_Text11" style="position:absolute;left:7px;top:22px;width:780px;height:16px;text-align:center;z-index:2;">
<span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:11px;">Copyright © 2013 by &quot;Your Name&quot;&nbsp; ·&nbsp; All Rights reserved&nbsp; ·&nbsp; E-Mail: yourname@domain.com</span></div>
</div>
</div>
<div style="position:absolute; text-align:center; left:274px; top:384px; width:802px; height:290px; z-index:13; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000;" title="">
  <div class="indent1">
									<h3 class="style2">Form Edit </h3>
									<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
									  <div align="left"></div>
									  <p>&nbsp;</p>
  
                                      <table border="1">
                                        <tr>
                                          <td width="99">No</td>
                                          <td width="121">Lokasi</td>
                                          <td width="132">Fasilitas</td>
                                          <td width="97">Jam Operasional</td>
                                          <td width="75">Jenis Produk</td>
                                          <td width="107">Action</td>
                                        </tr>
                                        <?php do { ?>
                                          <tr>
                                            <td><?php echo $row_tampil_adm['No']; ?></td>
                                            <td><?php echo $row_tampil_adm['Lokasi']; ?></td>
                                            <td><?php echo $row_tampil_adm['Fasilitas']; ?></td>
                                            <td><?php echo $row_tampil_adm['Jam Operasional']; ?></td>
                                            <td><?php echo $row_tampil_adm['Jenis Produk']; ?></td>
                                            <td><a href="edit.php?No=<?php echo $row_tampil_adm['No']; ?>">Edit</a> / <a href="hapus.php?No=<?php echo $row_tampil_adm['No']; ?>">Hapus</a><a href="hapus.php?No=<?php echo $row_tampil_adm['No']; ?>"></a> </td>
                                          </tr>
                                          <?php } while ($row_tampil_adm = mysql_fetch_assoc($tampil_adm)); ?>
                                      </table>
									</form>		
                                    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
                                      <p>&nbsp;</p>
                                    </form>
                                    <p>&nbsp;</p>
  
                                    <form method="post" name="form3" action="<?php echo $editFormAction; ?>">
                                    </form>
                                    <p>&nbsp;</p>
  </div>
</div>

</body>
</html>
<?php
mysql_free_result($tampil_adm);
?>