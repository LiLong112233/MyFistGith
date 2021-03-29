 <?php  
 include ('job.php');
 $job=new Job();
 echo $job->name;
 echo $job::Age;
 echo $job::$sex;

 ?>