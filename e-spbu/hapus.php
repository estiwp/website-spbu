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

if ((isset($_GET['No'])) && ($_GET['No'] != "")) {
  $deleteSQL = sprintf("DELETE FROM pencarian WHERE `No`=%s",
                       GetSQLValueString($_GET['No'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($deleteSQL, $koneksi) or die(mysql_error());

  $deleteGoTo = "tampil_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_hapus = "-1";
if (isset($_GET['No'])) {
  $colname_hapus = (get_magic_quotes_gpc()) ? $_GET['No'] : addslashes($_GET['No']);
}
mysql_select_db($database_koneksi, $koneksi);
$query_hapus = sprintf("SELECT * FROM pencarian WHERE `No` = %s ORDER BY `No` ASC", $colname_hapus);
$hapus = mysql_query($query_hapus, $koneksi) or die(mysql_error());
$row_hapus = mysql_fetch_assoc($hapus);
$totalRows_hapus = mysql_num_rows($hapus);

mysql_free_result($hapus);
?>