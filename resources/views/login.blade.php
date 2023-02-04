<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login page</title>
  <style>
    body {
      background-color: #e3e3e3;
    }

    .menu_block {
      display: flex;
      justify-content: flex-start;
    }
    .menu_link {
      background-color: #0000ec;
      display: inline-block;
      width: 40px;
      height: 40px;
      cursor: pointer;
      position: relative;
      left: 20px;
      top: 20px;
    }
    .menu_line--top,
    .menu_line--middle,
    .menu_line--bottom {
      display: inline-block; 
      height: 1px;
      background-color: white;
      position: absolute;
      transition: 0.5s;
      left: 10px
    }
    .menu_line--top {
      width: 25%; 
      top: 10px;
    }
    .menu_line--middle {
      width: 50%;
      top: 20px;
    }
    .menu_line--bottom {
      width: 12%;
      bottom: 10px;
    }
    .icon {
      color: #0000ec;
      margin-left: 40px;
    }

    .login_contents {
      background-color: white;
      margin:20px auto;
      width: 50vw;
    }
    .login_title {
      background-color: #0000ec;
      color:white;
      padding: 15px 20px;
    }
    .form_text_block {
      text-align: center;
      margin:10px 0;
    }
    .person_icon_img {
      width:20px;
    }
    .email_icon_img {
      width:20px;
    }
    .key_icon_img {
      width:20px;
    }
    .form_text {
      border: none;
      border-bottom:1px solid gray;
    }
    .login_botton {
      background-color:#0000ff;
      color:white;
      border: none;
      padding: 5px 15px;
      margin-bottom:10px;
    }
    .login_botton_block {
      display: flex;
      justify-content: space-between;
      margin:10px 10px;
    }
  </style>
</head>

<body>
  <header class="header_register">
    <div class="menu_block">
      <div class="menu_link">
        <span class="menu_line--top"></span>
        <span class="menu_line--middle"></span>
        <span class="menu_line--bottom"></span>
      </div>
      <h1 class="icon">Rese</h1>
    </div>
  </header>
  <main class="login_contents">
    <p class="login_title">Login</p>
    <form action="/login" method="get">
      @csrf
      <div class="form_text_block">
        <div class="text_email">
          <img src="/images/email_icon.png" class="email_icon_img">
          <input class="form_text" name="email" type="text" placeholder="Email">
        </div>
        <div class="text_password">
          <img src="/images/key_icon.png" class="key_icon_img">
          <input class="form_text" name="password" type="text" placeholder="Password">
        </div>
      </div>
      <div class="login_botton_block">
        <a href="/user">ユーザー登録していない方はこちら</a>
        <input class="login_botton" type="submit" value="ログイン">
      </div>
    <form>      
  </main>
</body>
</html>