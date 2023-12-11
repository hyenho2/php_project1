<?php
 //데이타베이스 정보
 $db_host = "localhost";
 $db_user = "root";
 $db_password = "qwer";
 $db_name = "web_db";
 $connect = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
 if ($connect->connect_errno) { die('Connection Error : '.$connect->connect_error); } // 오류가 있으면 오류 메세지 출력
?>
<?php
    $con = mysqli_connect("localhost", "root", "qwer", "php_db");
    mysqli_query($con,'SET NAMES utf8');	
	
//세션 데이터에 접근하기 위해 세션 시작
if (!session_id()) {
	session_start();
  }


  $idx = $_GET['idx'];                                             
  $sql = "select * from board where idx ='$idx'"; 
  $result = mysqli_query($con, $sql); 
  $row = mysqli_fetch_array($result);  

?>




<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- //구글폰트 -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>게시판 글작성</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
    <!-- Custom styles for this template -->	
    <link href="css/reset_responsive.css" rel="stylesheet">    
	<link href="css/style.css" rel="stylesheet">
    <link href="css/board.css" rel="stylesheet">
	<link href="css/submenu2.css" rel="stylesheet">
	<link href="css/border.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles1.css" rel="stylesheet" />
	<!--   -->
  </head>
  <body>


<!--타이틀자리 -->
<header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/1234.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0" >게시판</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">글작성</p>
            </div>
        </header>


<!-- 헤더 네비게이션 -->
	
<div class="container">	
	


	
	<!-- 게시판 쓰기 -->
	
	<form action="project_boardwriteok.php" enctype="multipart/form-data" method="POST">
	
	<div id="board_write">
		<table>
			<colgroup>
				<col width="20%">
				<col>
			</colgroup>

			 
			<tbody>
				<tr>
					<th>작성자</th>					
					<td><input type="text" name="write" class="form-control" value="" detect="" detect-check="true" required></td>
					
				</tr>
				
				
				
				<tr>
					<th>제목</th>
					<?php if($answer==1) { ?>
					<td><input type="text" name="title" id="title" class="form-control" value="ㄴ[ <?=$subject?> ]의 답변" detect="" detect-check="true"required></td>
					<?php } else { ?>
					<td><input type="text" name="title" id="title" class="form-control" value="" detect="" detect-check="true"required></td>
					<?php } ?>	
				</tr>
				<tr>
									<th>웹툰사이트</th>	
									<td><form action="">
									<select class="form-control" id="search-type" name="site">
									<option value="네이버웹툰" name = "site" class="form-control" value="" detect="" detect-check="true" selected><?=$site ?>네이버웹툰</option>
									<option value="카카오페이지" name = "site" class="form-control" value="" detect="" detect-check="true"><?=$site ?>카카오페이지</option>
									<option value="레진코믹스" name = "site" class="form-control" value="" detect="" detect-check="true"><?=$site ?>레진코믹스</option>
									</select>
						
				</form>
									</tr>
				  
				<tr>
					
					<td colspan="2" class="editor"><textarea name="content" rows="20" title="내용" required></textarea></td>
					
				</tr>
				
				
				
			</tbody>
		
		</table>
	</div>
	<!-- //게시판 쓰기 -->

	<!-- 게시판 버튼 -->
	<div class="border_btn2">
		<button type="submit" class="btn blue" > 확인 </button> 
		<button type="button" class="btn gray" onclick="location.href='project_board.php'; return false;"> 취소 </button> 

	</div>
	<!-- //게시판 버튼 -->
	<input type="hidden" name="page" value="<?=$page_name?>" />
	<input type="hidden" name="answer" value="<?=$answer?>" />
	<? if($answer==1) { ?>
	<input type="hidden" name="idx" value="<?=$idx?>" />
	<?}?>
	</form>
	
</div>
<!-- //본문 -->





<footer class=" container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2023 project, green</p>
    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="project_index.html" class="nav-link px-2 text-muted">Home</a></li>
    </ul>
</footer>




  </body>

</html>
