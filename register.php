<?php 
  session_start();
  if(isset($_SESSION['name']) || isset($_SESSION['username']) || isset($_SESSION['email'])){
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="/image/favicon.ico" />
    <link rel="stylesheet" href="css/login.css" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <title>PR TIMES｜ログイン</title>
  </head>

  <body>
    <div class="wrapper">
      <header>
        <img src="/image/Frame.png" alt="logo" />
      </header>
      <div class="main">
        <div class="login">
          <h3>ユーザーレジスター</h3>
          <?php if(isset($_GET['error'])) {?>
            <p class="error"><?php echo $_GET['error'];?></p>
          <?php }?>
          <form action="register_process.php" method="POST">
            <div class="form-group">
              <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                placeholder="メールアドレス"
                required
              />
              <i class="far fa-envelope fa-lg"></i>
            </div>
            <div class="form-group">
              <input
                type="text"
                name="username"
                id="username"
                class="form-control"
                placeholder="ユーザーネーム"
                required
              />
              <i class="fas fa-user"></i>
            </div>
            <div class="form-group">
              <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                placeholder="名前"
                required
              />
              <i class="fas fa-signature"></i>
            </div>
            <div class="form-group">
                <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="パスワード"
                required
              />
              <i class="fas fa-lock fa-lg"></i>
              <span class="show-hide-pw">表示</span>
            </div>
            <div class="form-group">
                <input
                type="password"
                name="cpassword"
                id="cpassword"
                class="form-control"
                placeholder="パスワード コンファーム"
                required
              />
              <i class="far fa-check-circle"></i>
              <span class="show-hide-pw">表示</span>
            </div>
            <input type="submit" id="submit-register" value="レジスター" class="btn btn-submit" />
          </form>
          <p class="description">
            アカウントをお持ちでない方で、PR
            TIMESでプレスリリース配信・掲載を希望される方は、”お申し込み”ボタンから企業登録申請を行ってください。
          </p>
        </div>
      </div>
      <footer>
          <ul class="service">
                <li class="service__item">
                    <a href="https://prtimes.jp/main/html/company">
                        会社概要
                    </a>
                </li>
                <li class="service__item">
                    <a href="https://prtimes.co.jp/policy/">
                        プライバシーポリシー
                    </a>
                </li>
                <li class="service__item">
                    <a href="http://www.vectorinc.co.jp/iso.html">
                        情報セキュリティ基本方針
                    </a>
                </li>
                <li class="service__item">
                    <a href="https://tayori.com/faq/89b604344ebb744dbba41f73d4134560c997a743">
                        プレスリリース掲載基準
                    </a>
                </li>
                <li class="service__item">
                    <a href="https://prtimes.jp/main/html/kiyaku">
                        ご利用規約
                    </a>
                </li>
                <li class="service__item">
                    <a href="https://tayori.com/form/1f80a06fde99c4f33be888ac560c15421569a670">
                        お問い合わせ
                    </a>
                </li>
          </ul>
          <div class="copyright">
            <small class="copyright__text">Copyright © PR TIMES All Rights Reserved.</small>
        </div>
      </footer>
    </div>
    <script>
        var show_hide_pw = document.querySelector('.show-hide-pw')
        show_hide_pw.onclick = function(){
            let password_textbox = document.querySelector('#password')
            if(password_textbox.type === "password"){
                password_textbox.type = "text"
                this.textContent = "非表示"
            }
            else{
                password_textbox.type = "password"
                this.textContent = "表示"
            }
        }
        var user_password = document.querySelector('#password');
        var user_cpassword = document.querySelector('#cpassword');
        var submit_register = document.querySelector('#submit-register');
        submit_register.onclick = function(e){
            if(user_cpassword.value !== user_password.value){
                e.preventDefault();
                alert("password confirm must be match password");
            }
        }
    </script>
  </body>
</html>
