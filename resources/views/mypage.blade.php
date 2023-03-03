<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mypage</title>
  <link href="{{ asset('/dist/css/mypage.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/dist/css/nav.css') }}" rel="stylesheet" type="text/css">
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
      <script src="{{ asset('/dist/js/menu.js') }}"></script>
      <h1 class="icon">Rese</h1>
    </div>
  </header>

  <main class="mypage_contents">
    <div class="reservation_statues">
      <h3 class="reservation_statues_title">予約状況</h3>
      @foreach($reserves as $key=>$reserve)
        <div class="reservation_statues_block">
          <div class="mypage_reservation_icon_block">
            <div class="mypage_reservation_icon_block_left">
              <img src="/images/timer_icon.png" class="mypage_resercation_icon">
              <p class="mypage_reservation_title">予約{{$key+1}}</p>
            </div>
            <form action="cancel//?id={{$reserve->id}}" method="post">
              @csrf
              <input class="shop_detail_return_botton" type="submit" value="✕">
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
      <div class="card_list">
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
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </main>
</body>   
</html>