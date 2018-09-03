<?php
session_start();
if(isset($_POST['submit'])){
    include 'databases.php';
    $uid=  mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd=  mysqli_real_escape_string($conn,$_POST['pwd']);
     //error handlers
    if(empty($uid) || empty($pwd)){
        
        header("Location: ../index.php? login=error");
    
        exit();
    }else{
        $sql="SELECT * FROM users WHERE user_uid='$uid'";
        $result= mysqli_query($conn, $sql);
        $resultCheck=  mysqli_num_rows($result);
        if($resultCheck <1){
            
          header("Location: ../index.php? login=error");
    
          exit();}else{
             if($row =  mysqli_fetch_assoc($result)){
            //dehash the password
             $hashedPwdCheck=password_verify($pwd,$row['user_pwd']);
             if($hashedPwdCheck==FALSE){
                   header("Location: ../index.php? login=error");
                   exit();}
             elseif ($hashedPwdCheck==TRUE) {
                   //login the user.
                   $_SESSION['u_id']=$row['user_id'];
                   $_SESSION['u_first']=$row['user_first'];
                   $_SESSION['u_last']=$row['user_last'];
                   $_SESSION['u_email']=$row['user_email'];
                   $_SESSION['u_uid']=$row['user_uid'];
                    header("Location: ../index.php? login=success");
                    exit();
                }
             }
          }
        }
    
}else{
    header("Location: ../index.php? login=empty");
    exit();
}

