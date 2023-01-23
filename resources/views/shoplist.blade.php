<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop list page</title>
  <style>
    body {
      background-color: #e3e3e3;
    }

    .header_shop_list {
      display: flex;
      justify-content: space-between;
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

    .search {
      background-color: white;
      height: 30px;
      margin-top:20px;
      padding:10px 10px;
      /* position: relative; */
    }
    .area_search {
      padding:5px 10px;
      border: none;
      border-right:1px solid gray;
    }
    .genre_search {
      padding:5px 10px;
      border: none;
      border-right:1px solid gray;
    }

    .glass_icon_img {
      width:20px;
    }
    .search_form {
      padding:5px 10px;
    }

    .card {
      width:200px;
      position: relative;
    }
    .shop_list_photo {
      width:100%;
      z-index: 1;
    }
    .shop_list_contents {
      width:100%;
      height:100px;
      background-color: white;
      position: absolute;
      top: 133px;
    }
    .shop_list_name {
      margin-left:10px;
      position: absolute;
    }
    .shop_tag {
      margin-left:10px;
      font-size:10px;
      position: absolute;
      top: 30px;
    }
    .shop_detail_botton {
      position: absolute;
      top: 70px;
      display: block;
      background-color: #0000ec;
      color:white;
      border: none;
      border-radius:5px;
      font-size: 10px;
      padding: 5px 15px;
      margin-left:10px;
    }

  </style>
</head>
<body>
  <header class="header_shop_list">
    <div class="menu_block">
      <div class="menu_link">
        <span class="menu_line--top"></span>
        <span class="menu_line--middle"></span>
        <span class="menu_line--bottom"></span>
      </div>
      <h1 class="icon">Rese</h1>
    </div>
    <form class="search" action="/search" method="get">
      <select name="area" class="area_search">
        <option hidden>All area</option>
        <option value="1">東京都</option>
        <option value="2">大阪府</option>
        <option value="3">福岡県</option>
      </select>
      <select name="genre" class="genre_search">
        <option hidden>All area</option>
        <option value="1">寿司</option>
        <option value="2">焼肉</option>
        <option value="3">居酒屋</option>
        <option value="4">イタリアン</option>
        <option value="5">ラーメン</option>
      </select>
      <img src="/images/glass_icon.png" class="glass_icon_img">
      <input type="text" class="search_form">
    </form>
  </header>

  <main class="shop_list">
    <div class="card">
      <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" class="shop_list_photo">
      <div class="shop_list_contents">
        <h3 class="shop_list_name">***</h3>
        <p class="shop_tag">###</p>
        <div class="shop_link">
          <form action="/detail" method="get">
            <input class="shop_detail_botton" type="submit" value="詳しくみる">
          </form>
          <div class="favorite_icon"></div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>