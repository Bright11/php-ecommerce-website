<?php include'../include/header.php';
include"../include/navber.php";?>
<div class="container text-center" style="margin-top: 80px;">
<?php 
include("../db/db.php");
include("../useripaddress/userip.php");
$grand_total = 0;
$allItems = '';
$items = array();

$sqli = "SELECT CONCAT(product_title, '(',qty,')') AS ItemQty, total_price FROM cart WHERE  ip_address='$ip'";
$stmt = $conn->prepare($sqli);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
	$grand_total +=$row['total_price'];
	$items[] = $row['ItemQty'];
}
$allItems = implode("", $items);
?>
<?php
 $megs=''; $msg='';
 require '../phpmailer/PHPMailer.php';
 require '../phpmailer/SMTP.php';
 require '../phpmailer/Exception.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 include("../db/db.php");
if (isset($_POST['submit'])) {
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$product = $_POST['product'];
$price = $_POST['price'];
$customer_city = $_POST['customer_city'];
$location = $_POST['location'];
$customer_contact = $_POST['customer_contact'];
$customer_ip = $_POST['customer_ip'];
$date = $_POST['date'];
$invoice= bin2hex(random_bytes(5));


if (!filter_var($customer_email,FILTER_VALIDATE_EMAIL)) {
	  $megs='<div style="background:blue;color:white;font-size:20px;">Your email is not valid please!..</div>';
}
else{
	
  $sqli="INSERT INTO customers_order(customer_name,customer_email,product,price,customer_city,location,customer_contact,customer_ip,invoice,date)values(?,?,?,?,?,?,?,?,?,?)";
  $stmt=$conn->prepare($sqli);
  $stmt->bind_param('ssssssssss',$customer_name,$customer_email,$product,$price,$customer_city,$location,$customer_contact,$customer_ip,$invoice,$date);
  if ($stmt->execute()) {

//create instances of phpmailer
$mail = new PHPMailer();
//set mailer to use smtp
 $mail->isSMTP();
//define smtp host
$mail->Host  = "smtp.gmail.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
//set type of encryption (ssl/tls)
$mail->SMTPSecure = "ssl";
//set port to connect smtp 587
$mail->Port = '465';
//set gmail username
 $mail->Username = "chikaschool2019@gmail.com";
//set gmail password
$mail->Password = "Myfather1111";
$mail->setFrom("chikaschool2019@gmail.com", "Bright C Web Developer.");

 
  $mail->addAddress ($customer_email);

  $mail->isHTML(true);

$mail->Subject = "Invoice";
$mail->Body = 'Completion of order from Bright C Web Developer.'."\r\n";
$mail->Body .= $customer_name ."<br>";
$mail->Body .= $customer_email ."<br>";
$mail->Body .= $product ."<br>"."Amount Paid:"."\r\n";
$mail->Body .= $price ."<br>"."Location:"."\r\n";
$mail->Body .= $location ."<br>"."Phone Number:"."\r\n";
$mail->Body .= $customer_contact ."<br>"."Date:"."\r\n";
$mail->Body .= $date ."<br>"."INVOICE ID:"."\r\n";
$mail->Body .= $invoice ."<br>"."You can Call our customer care on +233543461813"."\r\n";
//$mail->Body .= $url;
if (!$mail->send()) {
	$msg = "<div style='background:blue;color:white;font-size:20px;'>Something went wrong! please try again or call us on +233543461813!</div>";

}else{
	$msg = "<div style='background:blue;color:white;font-size:20px;'>An invoice has been sent to your email!.</div>";
      
	}
	
	}else{
		$msg = "<div style='background:blue;color:white;font-size:20px;'>An Error occur try again or call us on +233543461813!.</div>";
	}
}

}
  	 
?>
<?php echo $megs;?>
<?php echo $msg;?>
<div class="box">
<form  class="form" method="post">
<div class="form-group">
<label for="name">Fully Name</label>
<input type="text" class="form-control" name="customer_name" placeholder="Enter Your Fully Name..." required>
</div>
<div class="form-group">
<label for="name">Email</label>
<input type="text" class="form-control" name="customer_email" placeholder="Email....." required>
</div>.
<div class="form-group">
<label for="name">Product</label>
<input class="form-control" name="product" value="<?= $allItems; ?>" readonly>
</div>
<div class="form-group">
<label for="name">Price</label>
<input type="text" class="form-control" name="price" value="<?= number_format($grand_total,2) ?>" readonly>
</div>
<div class="form-group">
<label for="name">City</label>
<input type="text" class="form-control" name="customer_city" placeholder="Location....." required>
</div>
<div class="form-group">
<label for="name">Location</label>
<textarea  class="form-control" name="location" placeholder="Location....." required></textarea>
</div>
<div class="form-group">
<label for="name">Phone Number</label>
<input type="number" class="form-control" name="customer_contact" placeholder="Number">
</div>
<div class="form-group">
<label for="name">IP Address</label>
<input type="text" class="form-control" name="customer_ip" value="<?php echo $ip;?>">
</div>
<div class="form-group">
<label for="date">Date</label>
<input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>" readomly>
</div>
<div class="form-group">
<input type="submit" class="form-control" name="submit" value="SEND">
</div>
</form>

</div>
</div>