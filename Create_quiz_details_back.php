
<?php
include('./Connect.php');
session_start();

 if(isset($_POST['submit']))
  {  
     $eid=uniqid();
     $qtitle= $_POST['qtitle'];
     $qno=$_POST['qno'];
     $qright=$_POST['qright'];
     $qwrong=$_POST['qwrong'];                                                                                          
     $qtime=$_POST['qtime'];
     $qdescription=$_POST['qdescription'];
     $admin_id = $_SESSION['admin_id'];
     $author = $_SESSION['aname'];


     $query1 = " SELECT * FROM `create_quiz_details` WHERE `qtitle` = '$qtitle' ";
     $res1 = mysqli_query($Connect,$query1);
     $data = mysqli_fetch_assoc($res1);
 
     if(strcmp($data['qtitle'],$qtitle)==0)
     {
       echo("<script>alert('Quiz is Already Created!')</script>");
       echo("<script>window.location = 'create_quiz_details.php'</script>");
     }
     else
     {
  
       $query1 = "INSERT INTO `create_quiz_details`(`eid`,`admin_id`,`qtitle`,  `author`, `qno`, `qright`, `qwrong`, `qtime`, `qdescription`) VALUES ('$eid','$admin_id','$qtitle',$author,'$qno','$qright','$qwrong','$qtime','$qdescription')";
       $res1 = mysqli_query($Connect,$query1);
    
       echo("<script>alert('Quiz Details Saved Succesfully ')</script>");
       echo("<script>window.location = 'Create_quiz_que.php?admin_id=$admin_id&eid=$eid&n=$qno'</script>");
       session_start();
       $_SESSION['qtitle']=$data['qtitle'];
       $_SESSION['qno'] = $_POST['qno'];
     }

  }
  else
  {
     echo("<script>alert('Error !!! Undefined action!')</script>");
     echo("<script>window.location = 'Index.php'</script>");
  }
 
 
 
 
 ?>         