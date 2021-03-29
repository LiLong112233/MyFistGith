<?php 
include('exercise.php');


 ?>
 <table>
 	<?php foreach ($res as $key => $value) { ?>
         <?php echo $value['c_title']; ?>
     <?php } ?>
 </table>