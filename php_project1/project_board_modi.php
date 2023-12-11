<?php
 //데이타베이스 정보
 $db_host = "localhost";
 $db_user = "root";
 $db_password = "qwer";
 $db_name = "web_db";
 $connect = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
 if ($connect->connect_errno) { die('Connection Error : '.$connect->connect_error); } // 오류가 있으면 오류 메세지 출력

 $idx = $_GET['idx'];

 $select_query = "select * FROM board where idx = '$idx'";        
 $result = $connect->query($select_query);
 while($row = $result->fetch_assoc())
 {
    $title = $row['title'];    
    $writer = $row['writer'];  
    $content = $row['content']; 
    $site = $row['site'];
     // 날짜 포맷 
     $regdate = $row['reg_date'];
     $date = date_create($regdate);
     $_date = date_format($date, "Y.m.d");
 }
?>
<?php
    $con = mysqli_connect("localhost", "root", "qwer", "web_db");
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

   <!-- //구글폰트 -->
 

    <title>회원관리 사이트</title>

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
                <p class="masthead-subheading font-weight-light mb-0">글수정</p>
            </div>
        </header>



<!-- 헤더 네비게이션 -->
	 
      <div class="container">
        
<!--//네비게이션 종료-->
  


<!-- 게시판 쓰기 -->
	
<form action="board_modi_result.php" enctype="multipart/form-data" method="post">
	
	<div id="board_write">
		<table>
			<colgroup>
				<col width="20%">
				<col>
			</colgroup>

			 
			<tbody>
				<tr>
					<th>작성자</th>					
					<td><input type="text" name="writer" class="form-control" value="<?php echo $row['writer']?>" detect="" detect-check="true" readonly="true"></td>
					
				</tr>
				
				
				
				<tr>
					<th>제목</th>
					<td><input type="text" name="title" id="subject" class="form-control" value="<?php echo $row['title']?>" detect="" detect-check="true"></td>

				</tr>
        <tr>
                                     <th>웹툰사이트</th>	
                                     <td><output type="text" name="write" class="form-control" value="" detect="" detect-check="true" required><?=$site ?></td>
                                     </tr>
				<tr>
					
					<td colspan="2" class="editor"><textarea name="content" rows="20" title="내용"><?php echo $row['content']?></textarea></td>
					
				</tr>
				
				
				
				
			</tbody>
		
		</table>
	</div>
	<!-- 수정대상 글 idx 보내기 -->
	<input type="hidden" id="idx" name="idx" value="<?php echo $row['idx']?>">

	<!-- //게시판 쓰기 -->
	<div class="border_btn2">
    <button type="submit" class="btn blue" return false;> 수정완료</button> 
    <button type="button" class="btn gray" onclick="location.href='project_board.php'"> 취소하기</button>  
  </div>

</form>


<footer class=" container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2023 project, green</p>
    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="project_index.html" class="nav-link px-2 text-muted">Home</a></li>
    </ul>
</footer>







  </body>

</html>
