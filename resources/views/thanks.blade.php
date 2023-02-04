<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login thanks page</title>
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

    .thanks_contents {
      background-color:white;
      margin:20px auto;
      padding:50px 0px;
      width: 40vw;
    }
    .thanks_comment {
      text-align: center;
    }
    .thanks_return_botton {
      color:white;
      background-color:#0000ec;
      display:block;
      margin:0 auto;
      padding:5px 10px;
      border:none;
    }
  </style>
</head>
<body>
  <header class="header_thanks">
    <div class="menu_block">
      <div class="menu_link">
        <span class="menu_line--top"></span>
        <span class="menu_line--middle"></span>
        <span class="menu_line--bottom"></span>
      </div>
      <h1 class="icon">Rese</h1>
    </div>
  </header>
  <main class="thanks_contents">
    <p class="thanks_comment">会員登録ありがとうございます</p>
    <form action="/auth" method="get">
      <input class="thanks_return_botton" type="submit" value="ログインする">
    <form>      
  </main>
</body>
</html>