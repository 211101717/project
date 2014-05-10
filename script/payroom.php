<?php
$invoice = $_GET['invoice_no'];
$pay = $_GET['pay'];
include '../class/dbconn.class.php';
$db = new Database();
$query = "update invoice set amount_due = (amount_due - $pay) where invoice_no = $invoice";
$db->execute($query);

$query = "select amount_due from invoice where invoice_no = $invoice";
$result = $db->execute($query);
if(mysql_affected_rows() > 0){
	$query = "update invoice set status = 'paid' where invoice_no = $invoice";
	$db->execute($query);
}
while($balance = mysql_fetch_array($result)){
	$b = $balance['amount_due'];
	echo (number_format($b,2) );
}
?>
