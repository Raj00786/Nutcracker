<?php include 'database.php';?>
<?php session_start(); ?>
<?php
    
  $phy = 0;
  $chm = 0;
  $mth = 0;
  $points=0;$current_sub=0;
  $sub="";
  $subject = $_POST['subject'];
  $name  =  $_SESSION['name'];
  if($subject=='physics')
  {
     $sub='phy';
  }
  else if($subject=='chemistry')
  {
     $sub='chm';
  }
  else if($subject=='maths')
  {
     $sub='mth';
  }
  else{
    die('error');
  }
  $user_query ="SELECT * FROM leader WHERE name ='$name'";
  $user_result = mysqli_query($conn,$user_query); 
  $user= mysqli_fetch_assoc($user_result);
  
  if(!$user){
      $insert_query = "INSERT INTO leader (name) VALUES ('$name')";   
      mysqli_query($conn,$insert_query); 
  }
  else{
      $select_query ="SELECT * FROM leader WHERE name='$name'";  
      $select_result = mysqli_query($conn,$select_query); 
      $select  = mysqli_fetch_assoc($select_result);
      $current_sub = $select[$sub];
      //$chm = $select['chm'];
    //  $mth = $select['mth'];
  }
  // $rows_query ="SELECT * FROM physics";
  // $rows_result = mysqli_query($conn,$rows_query); 
  // $rows = mysqli_num_rows($rows_result)-1;

  if($current_sub==='10'){
     echo json_encode("done");
     die();
  }

     $points=$current_sub;
     $ques_query ="SELECT * FROM $subject WHERE id = $current_sub+1";
  
 
	$ques_result = mysqli_query($conn,$ques_query); 
	$question= mysqli_fetch_assoc($ques_result);    
 
  $choices_list['points'] =  $points; 
  $choices_list["ques"] = $question['text'];

  echo json_encode($choices_list);
 ?>