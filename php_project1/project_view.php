
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
                <p class="masthead-subheading font-weight-light mb-0">등록글</p>
            </div>
        </header>


<!-- 헤더 네비게이션 -->
	
<div class="container">	
	


	
	<!-- 게시판 쓰기 -->
	
	<form action="project_board_modi.php" enctype="multipart/form-data" method="POST">
	
	<div id="board_write">
		<table>
			<colgroup>
				<col width="20%">
				<col>
			</colgroup>

			 
			<tbody>
			
				<tr>
                
                
                            <tr>
                                <tr>
                                <th>작성자</th>	
                                     <td><output type="text" name="write" class="form-control" value="" detect="" detect-check="true" required><?=$writer ?></td>
                        </tr>
                        <tr>
                                     <th>제목</th>
                                    <?php if($answer==1) { ?>
                                    <td><ouput type="text" name="title" id="title" class="form-control" value="ㄴ[ <?=$subject?> ]의 답변" detect="" detect-check="true"required><?=$title ?></td>
                                    <?php } else { ?>
                                    <td><ouput type="text" name="title" id="title" class="form-control" value="" detect="" detect-check="true"required><?=$title ?></td>
                                    <?php } ?>	
                                    </tr>
                                    <tr>
                                     <th>웹툰사이트</th>	
                                     <td><output type="text" name="write" class="form-control" value="" detect="" detect-check="true" required><?=$site ?></td>
                                     </tr>
                                    <td colspan="2" class="editor"><textarea readonly="readonly" name="content" rows="20" title="내용" required ><?=$content ?></textarea></td>
                                   
                        </tr>
                        </tr>
                                               
                    
                       
				
					
				</tr>
				
	
      
			</tbody>
      
		
		</table>
	</div>
	<!-- //게시판 쓰기 -->

	<!-- 게시판 버튼 -->
  
  <div class="border_btn2">
    <button type="button" class="btn blue" onclick="location.href='/project_board_modi.php?idx=<?=$idx?>'; return false;"> 수정</button> 
    <button type="button" class="btn blue" onclick="location.href='/project_board_delete_ok.php?idx=<?=$idx?>'; return false;"> 삭제</button> 
    <button type="button" class="btn gray" onclick="location.href='/project_board.php?idx=<?=$idx?>'; return false;"> 뒤로</button>  
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
        <li class="nav-item"><a href="project_board.php" class="nav-link px-2 text-muted"></a></li>
    </ul>
</footer>




  </body>

</html>
