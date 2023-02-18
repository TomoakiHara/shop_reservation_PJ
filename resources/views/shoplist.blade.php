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

    /* 検索バー */
    .search {
      background-color: white;
      height: 30px;
      margin-top:20px;
      padding:10px 10px;
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
    .search_botton {
      width:20px;
    }

    /* 店舗一覧 */
    .shop_list {
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
    .favorite_icon {
      position: absolute;
      top: 70px;
      left: 160px;
      display: block;
      border: none;
      background-color: white;
    }

  </style>
</head>
<body>
  <header class="header_shop_list">      
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
    <form class="search" action="/search" method="get">
      <select name="area_id" class="area_search">
        <option value="" hidden>All area</option>
        @foreach($areas as $area)
        <option value="{{$area->id}}">{{$area->area}}</option>
        @endforeach
      </select>
      <select name="genre_id" class="genre_search">
        <option value="" hidden>All genre</option>
        @foreach($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->genre}}</option>
        @endforeach
      </select>      
      <input class="search_botton" type="image" src="/images/glass_icon.png" alt="">
      <input type="text" name="shop" class="search_form" placeholder="search...">
    </form>
  </header>
  <main class="shop_list">
    @foreach($shops as $shop)
    <div class="card">      
      <img src="{{$shop->img}}" class="shop_list_photo">
      <div class="shop_list_contents">
        <h3 class="shop_list_name">{{$shop->shop}}</h3>
        <p class="shop_tag">#{{$shop->area->area}}#{{$shop->genre->genre}}</p>
        <div class="shop_link">
          <form action="/detail/?id={{$shop->id}}" method="post">
            @csrf
            <input class="shop_detail_botton" type="submit" value="詳しくみる">
          </form>
          @empty($user->id)
          <form action="/favorite/?shop_id={{$shop->id}}" method="post">
            @csrf
            <input class="favorite_icon" type="submit" value="♡">
          </form>
          @else
            @forelse($shop->favorite as $favorite)
              @if ($user->id == $favorite->user_id && $shop->id == $favorite->shop_id)
              <form action="/delete/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
                @csrf
                <input class="favorite_icon" type="submit" value="❤">            
              </form>
              @endif
            @empty
            <form action="/favorite/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
              @csrf
              <input class="favorite_icon" type="submit" value="♡">
            </form>
            @endforelse
          @endempty
        </div>
      </div>      
    </div>
    @endforeach
  </main>
</html>