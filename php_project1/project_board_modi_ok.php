<?php
    $con = mysqli_connect("localhost", "root", "qwer", "web_db");
    mysqli_query($con,'SET NAMES utf8');

	$idx = $_POST['idx'];
    $title = $_POST['title'];
	$content = $_POST['content'];
	$stie = $_POST['site'];

	if(!$title)
	{
		echo "<script>alert('제목을 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}
	if(!$content)
	{
		echo "<script>alert('내용을 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}   
	
	$update_query = "update board set title='$title', content = '$content' where idx='$idx'"; 

	if($con->query($update_query)){
		echo "<script>alert('글 수정이 완료되었습니다.')</script>";
		echo "<script>location.href='project_board.php';</script>";
	}else{
			echo "<script>alert('글 수정시 오류! 관리자에게 문의주세요.')</script>";	   
			echo "<script>location.href='project_board.php';</script>";
	}
    
?> 

