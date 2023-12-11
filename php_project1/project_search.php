<?php
 //데이타베이스 정보
 $db_host = "localhost";
 $db_user = "root";
 $db_password = "qwer";
 $db_name = "web_db";
 $connect = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
 if ($connect->connect_errno) { die('Connection Error : '.$connect->connect_error); } // 오류가 있으면 오류 메세지 출력

 $title = $_POST['search'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>웹툰 자유게시판</title>
    
    <link rel="stylesheet" href="/css/project_board.css">
</head>
<body>
<section>
<div class="row">
<link rel="stylesheet" href="/css/1234.css">
        <div class="card card-margin search-form">
            <div class="card-body p-0">
                <form id="search-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <label for="search-type" hidden>검색 유형</label>
                             
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                    <label for="search-value" hidden>검색어</label>
                                    <input type="text" placeholder="검색어..." class="form-control" id="search-value" name="searchValue">
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">

                                    <button type="submit" class="btn btn-base">
                                      
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!--for demo wrap-->
  <h1>웹툰 자유게시판</h1>
  
  <div class="tbl-header">
    
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>번호</th>
          <th>제목</th>
          <th>날짜</th>
          <th>웹툰사이트</th>
          <th>글쓴이</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
       
        <?php
                        $select_query = "select * FROM board where title = '$title'";        
                        $result = $connect->query($select_query);
                        while($row = $result->fetch_assoc())
                        {
                            // 날짜 포맷 
                            $regdate = $row['reg_date'];
                            $date = date_create($regdate);
                            $_date = date_format($date, "Y.m.d");
                            ?>
                            <tr>
                                <tr>
                                    <td><?=$row['idx']?></td>
                                    <td class="left"><a href="project_view.php?idx=<?=$row['idx']?>"><?=$row['title']?></a></td>
                                    <td><?=$_date?></td>
                                    <td><?=$row['site'] ?></td>
                                    <td><?=$row['writer']?></td>
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
  <a  href="project_boardwrite.php">글쓰기  / </a>
  <a  href="project_index.html"> home</a>
  ♥</i>
</div>
    
</body>
</html>