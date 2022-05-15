<?php
    require_once 'dbconnect.inc.php';
    $bid=$_GET['bid'];
    $shid=$_GET['shid'];
    $seatsno=$_GET['seatsno'];
    $sql="UPDATE booking SET visibility='0' WHERE bid='$bid';";
    mysqli_query($con,$sql);

    $sql2="SELECT avseat FROM shows WHERE shid='$shid';";
    $rs=mysqli_query($con, $sql2);
    $row=mysqli_fetch_array($rs);
    $avseat=$row['avseat'];

    $leftseat=$avseat+$seatsno;

    $sql3="UPDATE shows SET avseat='$leftseat' WHERE shid='$shid';";
    mysqli_query($con, $sql3);

    header("location:index.php?cancel=success");
?>