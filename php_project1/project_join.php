<? $body = nl2br($body);  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 로그인</title>
    <link href="css/project_join.css" rel="stylesheet">
</head>
<body>
    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
          <!-- SIGN UP -->
          <div class="col align-items-center flex-col sign-up">
            <div class="form-wrapper align-items-center">
          
              <div class="form sign-up">
                
                <div class="input-group">
                <form method="POST" action="project_joinok.php" >
                  <i class='bx bxs-user'></i>
                  <input type="text" name ='id2' placeholder="아이디" >
                </div>
                <div class="input-group">
                  <i class='bx bxs-lock-alt'></i>
                  <input type="password" name ='pw2' placeholder="비밀번호" >
                </div>
                <div class="input-group">
                  <i class='bx bxs-lock-alt'></i>
                  <input type="password" name ='pw_r' placeholder="비밀번호 확인">
                </div>
                <div class="input-group">
                  <i class='bx bx-mail-send'></i>
                  <input type="text" name ='name' placeholder="이름">
                </div>
                <div class="input-group">
                  <i class='bx bx-mail-send'></i>
                  <input type="text" name ='hp' placeholder="연락처">
                </div>
                <div class="input-group">
                  <i class='bx bx-mail-send'></i>
                  <input type="email" name ='email' placeholder="이메일" >
                </div>
                <span class="btn">
                <button type="submit"> 가입하기</button> 			
                </span>   
                <p>
                  <span>
                    로그인할 준비가 되었습니까?
                  </span>
                  <b onclick="toggle()" class="pointer">
                    로그인
                  </b>
                </form>
                </p>
              </div>
            </div>
          
          </div>
          <!-- END SIGN UP -->
          <!-- SIGN IN -->
          <div class="col align-items-center flex-col sign-in">
            <div class="form-wrapper align-items-center">
              <div class="form sign-in">
              <form id="Login" action="project_loginok.php" method="post">
                <div class="input-group">
                  <i class='bx bxs-user'></i>
                  <input type="text" name = 'id' placeholder="아이디">
                </div>
                <div class="input-group">
                  <i class='bx bxs-lock-alt'></i>
                  <input type="password" name = 'pw' placeholder="비밀번호">
                </div>
                  
                  <button type="submit" class="admin_login blue web"> 로그인</button> 			
                <p>
                </p>
                <p>
                  <span>
                    아이디가 없습니까?
                  </span>
                  <b onclick="toggle()" class="pointer">
                    회원가입
                  </b>
                  </form>
                </p>
              </div>
            </div>
            <div class="form-wrapper">
        
            </div>
          </div>
          <!-- END SIGN IN -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
          <!-- SIGN IN CONTENT -->
          <div class="col align-items-center flex-col">
            <div class="text sign-in">
              <h2>
                Welcome
              </h2>
      
            </div>
            <div class="img sign-in">
        
            </div>
          </div>
          <!-- END SIGN IN CONTENT -->
          <!-- SIGN UP CONTENT -->
          <div class="col align-items-center flex-col">
            <div class="img sign-up">
            
            </div>
            <div class="text sign-up">
              <h2>
                Join with us
              </h2>
      
            </div>
          </div>
          <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
      </div>
    
    
</body>
</html>
<script>
    let container = document.getElementById('container')

toggle = () => {
  container.classList.toggle('sign-in')
  container.classList.toggle('sign-up')
}

setTimeout(() => {
  container.classList.add('sign-in')
}, 200)
  </script>