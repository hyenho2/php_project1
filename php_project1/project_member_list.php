<?php

//세션 데이터에 접근하기 위해 세션 시작
if (!session_id()) {
  session_start();
}


    $con = mysqli_connect("localhost", "root", "qwer", "web_db");
    mysqli_query($con,'SET NAMES utf8');	
	 



$page = (isset($_GET["page"]) && $_GET["page"]) ? $_GET["page"] : 1;


if (empty($page)) { $page = 1; }

$select_query = "select COUNT(*) as size FROM member";        
$result = mysqli_query($con, $select_query); 
$row = mysqli_fetch_array($result);
$nums = $row['size'];


//화면에 목록 줄수
$listSize = 5;

//페이지 표시 최대 숫자
$blockSize = 5; // 추가 !!
$prevBlock="";
$nextBlock="";
$start = ($page - 1) * $listSize;


$totalListCount = ceil($nums/ $listSize); // 추가해주기

$no = $nums - $start; // 추가

$totalBlockCount = ceil($totalListCount/$blockSize);
$currentBlock = ceil($page / $blockSize);

$startPage = ($currentBlock - 1) * $blockSize + 1;

if ($currentBlock >= $totalBlockCount) {
    $endPage = $totalListCount;
} else {
    $endPage = $currentBlock * $blockSize;
}

if ($currentBlock > 1) {
    $prevBlock = "
        <a class='page-link' href='./member_list.php?page=".($startPage - 1)."' aria-label='Previous'>
            <span aria-hidden='true'>&laquo;</span>
        </a>";
}

if ($currentBlock < $totalBlockCount) {
    $nextBlock = "
        <a class='page-link' href='./member_list.php?page=".($endPage + 1)."' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
        </a>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원목록</title>
    
    <link rel="stylesheet" href="/css/project_board.css">
</head>
<body>
<section>
<div class="row">
<link rel="stylesheet" href="/css/1234.css">
<form action="project_search.php" enctype="multipart/form-data" method="POST">
  
  <!--for demo wrap-->
  <h1>회원목록</h1>
  
  <div class="tbl-header">
    
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>순번</th>
          <th>아이디</th>
          <th>이름</th>
          <th>전화번호</th>
          <th>이메일</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
       
        <?php
                      	$query = "select * FROM member ORDER BY idx desc LIMIT $start, $listSize";
                          $result = $con->query($query);	
                        while($row = $result->fetch_assoc())
                        {
                            // 날짜 포맷 
                            $regdate = $row['reg_date'];
                            $date = date_create($regdate);
                            $_date = date_format($date, "Y.m.d");
                            ?>
                            <tr>
                                <tr>
                                <td><?=$row["idx"]?></td>
                                <td ><?=$row["id"]?></td>                               
                                <td><?=$row["name"]?></td>
                                <td><?=$row["hp"]?></td>
								<td><?=$row["email"]?></td>
                        </tr>
                        </tr>
                        <?php                       
                        }
                        ?> 
             
 
    </table>
  </div>
</section>
<script>
// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>

<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥
  <a  href="project_logout_ok.php">로그아웃  / </a>
  <a  href="project_index_login.php"> home</a>
  ♥</i>
</div>
    
</body>
</html>