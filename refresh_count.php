<?php include("db/db.php");
  include("useripaddress/userip.php");
 $stmt = $conn->prepare("SELECT * FROM cart WHERE ip_address=?");
  $stmt->bind_param("s",$ip);
  $stmt->execute();
  $stmt->store_result();
 $count = $stmt->num_rows;
  //echo $count;
  if ($count>0) {
  //echo $count;
  	}
  ?>