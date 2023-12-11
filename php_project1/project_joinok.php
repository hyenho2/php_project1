<?php
 //데이타베이스 정보
 $db_host = "localhost";
 $db_user = "root";
 $db_password = "qwer";
 $db_name = "web_db";
 $connect = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
 if ($connect->connect_errno) { die('Connection Error : '.$connect->connect_error); } // 오류가 있으면 오류 메세지 출력



 $id = $_POST['id2'];
 $pw = $_POST['pw2'];
 $pw_r = $_POST['pw_r'];
 $name = $_POST['name'];
 $hp = $_POST['hp'];
 $email = $_POST['email'];
 $email_domain = $_POST['email_domain'];

 if(!$id)
 {
    echo "<script>alert('아이디를 입력하시오');</script>"; 
    echo "<script>history.back();</script>";     
    return;
 }
 if(!$pw || !$pw_r)
 {
    echo "<script>alert('패스워드를 입력하시오');</script>"; 
    echo "<script>history.back();</script>";    
    return; 
 }
 if($pw != $pw_r)
 {
    echo "<script>alert('패스워드와 확인이 일치하지않습니다.');</script>"; 
    echo "<script>history.back();</script>";  
    return;
 }
 if(!$name)
 {
    echo "<script>alert('이름을 입력하시오');</script>"; 
    echo "<script>history.back();</script>";     
    return;
 }
 if(!$hp)
 {
    echo "<script>alert('연락처를 입력하시오');</script>"; 
    echo "<script>history.back();</script>";     
    return;
 }
 if(!$email)
 {
    echo "<script>alert('이메일을 입력하시오');</script>"; 
    echo "<script>history.back();</script>";     
    return;
 }
 
 $query = "select * from member where id='$id'";
 $result = mysqli_query($connect, $query); 
 $row = mysqli_fetch_array($result);

 if($row['id']==null){ // 중복아이디가 없을경우
       
    
     $query = "INSERT INTO member
     (id, pw, name, hp, email) VALUES('$id','$pw','$name', '$hp', '$email')";
     $result = mysqli_query($connect, $query);     
     if($result != 1)
     {
         echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요');</script>"; 
         //echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
         echo "<script>history.back();</script>";   
         error_log(mysqli_error($connect));
     }else{
         //echo '성공했습니다. <a href="login.php">로그인하기..</a>';
         echo "<script>alert('정상적으로 회원가입 완료!!');</script>"; 
         echo "<script>location.href='project_join.php';</script>";
     }
  
  }else{ // 중복아이디가 있을경우
   
     echo "<script>window.alert('아이디가 존재함');</script>"; 
     echo "<script>history.back();</script>";  
  
  }

    //쿼리문 실행

    
?>