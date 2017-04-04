<?php include '../database.php';?>
<?php session_start(); 

    $name = $_SESSION['name'];
    $subject = $_SESSION['subject'];
    $ans_query = "SELECT * FROM leader WHERE name ='$name'";
    $ans_result = mysqli_query($conn,$ans_query); 
    $ans= mysqli_fetch_assoc($ans_result);
    $pans=$ans['pans'];$cans=$ans['cans'];$mans=$ans['mans'];


         if(isset($_FILES['file'])){
            $errors= array();
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_tmp =$_FILES['file']['tmp_name'];
            $file_type=$_FILES['file']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
             }
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"../uploads/".$file_name);
               echo "correct";
               $data = $file_name;
               if($subject==='physics'){
                   $pans = $pans .','.$data;
                   $update_query = "UPDATE leader SET pans = '$pans' ,phy = phy+1 WHERE name ='$name'";
                }
                else if($subject==='chemistry'){
                  $cans = $cans.','.$data;
                   $update_query = "UPDATE leader SET cans = '$cans' ,chm = chm+1 WHERE name ='$name'";
                } 
                else if($subject==='maths'){
                  $mans = $mans.','.$data;
                   $update_query = "UPDATE leader SET mans = '$mans' ,mth = mth+1 WHERE name ='$name'";
                }
                else{
                  die('error1');
                }  
                $update_result = mysqli_query($conn,$update_query); 
                mysqli_fetch_assoc($update_result); 
                
            }
            else{
                 echo "error";
          }
    } 
    else{
           echo "error1";
           echo $_FILES['fileToUpload'];
    }


?>
