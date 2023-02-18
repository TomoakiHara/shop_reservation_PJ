<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mypage</title>
  <style>
        body {
      background-color: #e3e3e3;
    }

    /* メニューアイコン */
    a{
      text-decoration: none;
      color: blue
    }
    .nav{
      position: absolute;
      height: 100vh;
      width: 100%;
      left: -100%;
      background: #eee;
      transition: .7s;
      text-align: center;
    }
    .nav ul{
      padding-top: 80px;
    }
    .nav ul li{
      list-style-type: none;
      margin-top: 50px;
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
      z-index: 2;
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
    .menu_link.open span:nth-of-type(1) {
    top: 20px;
    transform: rotate(45deg);
    width: 50%;
    }
    .menu_link.open span:nth-of-type(2) {
      opacity: 0;
    }
    .menu_link.open span:nth-of-type(3) {
      top: 20px;
      transform: rotate(-45deg);
      width: 50%;
    }
    .in{
      transform: translateX(100%);
      z-index: 2;
    }
    .icon {
      color: #0000ec;
      margin-left: 40px;
    }
    .menu_link_item {
      font-size: 40px;
    }

    .mypage_contents {
      display: flex;
      justify-content: space-around;
    }
    .reservation_statues {
      width:30vw;
      margin:20px 20px;
    }


    .reservation_statues_block {
      background-color: #0000ec;
      padding:20px 20px; 
    }
    .mypage_resercation_icon {
      width:20px;
      height:20px;
      margin-top:20px;
      margin-right:10px;
    }
    

    .mypage_reservation_icon_block {
      display: flex;
      justify-content: space-between;
    }
    .mypage_reservation_icon_block_left {
      display: flex;
      justify-content: flex-start;
    }


    .favorite_shop_list {
      display:flex;
      justify-content:center;
      flex-wrap: wrap;
      margin:0px 20px;
    }
    .card {
      width:200px;
      position: relative;
      margin:10px 20px 110px;
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
  <header class="header_mypage">
    <nav class="nav" id="nav">
      @empty($user->id)
      <ul>
        <li><a href="/" class="menu_link_item">Home</a></li>
        <li><a href="/user" class="menu_link_item">Registration</a></li>
        <li><a href="/auth" class="menu_link_item">Login</a></li>
      </ul>
      @else
      <ul>
        <li><a href="/" class="menu_link_item">Home</a></li>
        <li><a href="/logout" class="menu_link_item">Logout</a></li>
        <li><a href="/mypage" class="menu_link_item">Mypage</a></li>
      </ul>
      @endempty
    </nav>
    <div class="menu_block">
      <div class="menu_link" id="menu_link">
        <span class="menu_line--top"></span>
        <span class="menu_line--middle"></span>
        <span class="menu_line--bottom"></span>
      </div>
      <script>
      const target = document.getElementById("menu_link");
      target.addEventListener('click', () => {
      target.classList.toggle('open');
      const nav = document.getElementById("nav");
      nav.classList.toggle('in');
      });
      </script>
      <h1 class="icon">Rese</h1>
    </div>
  </header>
  <main class="mypage_contents">
    <div class="reservation_statues">
      <h3 class="reservation_statues_title">予約状況</h3>
      @foreach($reserves as $reserve)
      <div class="reservation_statues_block">
        <div class="mypage_reservation_icon_block">
          <div class="mypage_reservation_icon_block_left">
            <img src="/images/timer_icon.png" class="mypage_resercation_icon">
            <p class="mypage_reservation_title">予約{{$reserve->id}}</p>
          </div>
          <form action="cancel//?id={{$reserve->id}}" method="post">
            @csrf
            <input class="shop_detail_return_botton" type="submit" value="×">
          </form>
        </div>
        <table class="shop_reservation_table">
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Shop</th>
              <td class="shop_reservation_tabel_item">{{$reserve->shop->shop}}</td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Date</th>
              <td class="shop_reservation_tabel_item">{{$reserve->reserve_date}}</td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Time</th>
              <td class="shop_reservation_tabel_item">{{$reserve->reserve_time}}</td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Number</th>
              <td class="shop_reservation_tabel_item">{{$reserve->number}}人</td>
            </tr>
        </table>  
      </div> 
      @endforeach
    </div>  
    <div class="favorites_shop_list">
      <h2 class="login_user">{{$text}}</h2>
      <h3 class="favorite_shop_title">お気に入り店舗</h3>
      @foreach($favorites as $favorite)
      <div class="card">
        <img src="{{$favorite->shop->img}}" class="shop_list_photo">
        <div class="shop_list_contents">
          <h3 class="shop_list_name">{{$favorite->shop->shop}}</h3>
          <p class="shop_tag">#{{$favorite->shop->area->area}}#{{$favorite->shop->genre->genre}}</p>
          <div class="shop_link">
            <form action="/" method="get">
              <input class="shop_detail_botton" type="submit" value="詳しくみる">
            </form>
            <div class="favorite_icon"></div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
</body>   
</html>