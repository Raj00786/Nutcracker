<?php include '../database.php';?>
<?php session_start(); ?>
<?php
    $num = $_POST['num'];
    $data = $_POST["data"];
    $name = $_SESSION['name'];
    $subject = $_POST['subject'];
    
    
    if($subject==='physics'){
      $ques_query ="SELECT * FROM $subject WHERE id =$num";
    }
    else if($subject==='chemistry'){
      $ques_query ="SELECT * FROM $subject WHERE id =$num";
    } 
    else if($subject==='maths'){
      $ques_query ="SELECT * FROM $subject WHERE id =$num";
    }
    else{
          $subject = $_SESSION['subject'];
    }   

    $ans_query = "SELECT * FROM leader WHERE name ='$name'";
    $ans_result = mysqli_query($conn,$ans_query); 
    $ans= mysqli_fetch_assoc($ans_result);
    $pans=$ans['pans'];$cans=$ans['cans'];$mans=$ans['mans'];
 
    
    $ques_result = mysqli_query($conn,$ques_query); 
    $question= mysqli_fetch_assoc($ques_result);
     


    $correct = $question['ans'];
     if($subject==='physics'){
         $pans = $pans .','.$data;
          $update_query = "UPDATE leader SET phy = phy+1 WHERE name ='$name'";
          $update1_query = "UPDATE leader SET pans = '$pans' WHERE name ='$name'";
      }
      else if($subject==='chemistry'){
         $cans = $cans .','.$data;
          $update_query = "UPDATE leader SET chm = chm+1 WHERE name ='$name'";
          $update1_query = "UPDATE leader SET cans ='$cans'  WHERE name ='$name'";
      } 
      else if($subject==='maths'){
         $mans = $mans .','.$data;
          $update_query = "UPDATE leader SET mth = mth+1 WHERE name ='$name'";
          $update1_query = "UPDATE leader SET mans = '$mans'  WHERE name ='$name'";
      }
      else{
        die('error2');
      }   
      
      $update_result = mysqli_query($conn,$update_query); 
      mysqli_fetch_assoc($update_result); 
      $update1_result = mysqli_query($conn,$update1_query); 
      mysqli_fetch_assoc($update1_result); 

     if($data==$correct){
          echo 'correct';
        
          if($subject==='physics'){
              $update_query = "UPDATE leader SET phy1 = phy1+1 WHERE name ='$name'";
          }
          else if($subject==='chemistry'){
              $update_query = "UPDATE leader SET chm1 = chm1+1 WHERE name ='$name'";
          } 
          else if($subject==='maths'){
              $update_query = "UPDATE leader SET mth1 = mth1+1 WHERE name ='$name'";
          }
          else{
            die('error2');
          }   
        $update_result = mysqli_query($conn,$update_query); 
        mysqli_fetch_assoc($update_result); 
      }
?>
