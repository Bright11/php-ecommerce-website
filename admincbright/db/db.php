<?php
@$conn = new mysqli("sql102.epizy.com", "epiz_24331378", "8WPiKqFZFEx5", "epiz_24331378_chikagod");
if ($conn->connect_error) {
die("Connect filed!".$conn->connect_error);
}

?>