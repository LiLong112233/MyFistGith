<?php 
include ('../../demo/DB.class.php');
$db=new DB();
$res=$db->join('phonebrand','phone.b_id=phonebrand.b_id')->findAll('phone');




 ?>
 <table border="1">
 <?php foreach ($res as $key => $value) { ?>
 	<tr>
 		<td><?php echo $value['p_id']; ?></td>
 		<td><?php echo $value['p_name']; ?></td>
 		<td><?php echo $value['p_desc']; ?></td>
 		<td><?php echo $value['p_time']; ?></td>
 		<td><?php echo $value['b_name']; ?></td>
 		<td><span id="span_aaa"><a href="#?p_id=<?php echo $value['p_id']; ?> "onclick="check_ok()" >通过</a></span></td>
 	</tr>
 	<?php }?>
 </table>
 <script>
function check_ok() {
 var span_aaa = document.getElementById('span_aaa'); 
 if (check_ok) {
 	span_aaa.innerHTML=" ok"
 	console.log('aaa');
 }else{
 	span_aaa.innerHTML="<a href='#' onclick='check_ok()'>通过</a>"
 }

}







 </script>