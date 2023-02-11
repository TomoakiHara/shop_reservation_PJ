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
        @foreach($areas as $area)
        <option value="{{$area->id}}">{{$area->area}}</option>
        @endforeach
      </select>
      <select name="genre" class="genre_search">
        <option hidden>All genre</option>
        @foreach($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->genre}}</option>
        @endforeach
      </select>      
      <img src="/images/glass_icon.png" class="glass_icon_img">
      <input type="text" class="search_form" placeholder="search...">
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
          @foreach($shop->favorite as $favorite)
          @if ($user->id == $favorite->user_id && $shop->id == $favorite->shop_id  )
          <form action="/delete/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
            @csrf
            <input class="favorite_icon" type="submit" value="❤">
          </form>
          @else
          <form action="/favorite/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
            @csrf
            <input class="favorite_icon" type="submit" value="♡">
          </form>
          @endif
          @endforeach
        </div>
      </div>      
    </div>
    @endforeach
  </main>
</body>
</html>