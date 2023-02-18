<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop detail page</title>
  <style>
    body {
      background-color: #e3e3e3;
    }
    
    .shop_detail{
      width:45vw;
    }
    .shop_detail_contents {
      display:flex;
      justify-content:space-around;
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

    .shop_detail_title_block {
      display:flex;
      justify-content:flex-start;
    }
    .shop_detail_return_botton {
      margin-top:25px;
    }
    .shop_detail_photo {
      width:100%;
    }

    .shop_reservation_form {
      display: flex;
      flex-direction: column;
    }
    .shop_reservation {
      width:45vw;
      height:100%;
      background-color:#6d6dff;
      margin-top:20px;
      padding-top:10px;
      /* display: flex;
      flex-direction: column; */
    }
    .shop_reservation_title {
      color:white;
      margin:10px 20px;
    }
    .shop_reservation_date {
      margin:10px 20px;
      width:30%;
    }
    .shop_reservation_time {
      margin:10px 20px;
      width:30%;
    }
    .shop_reservation_number {
      margin:10px 20px;
      width:30%;
    }
    .shop_reservation_table {
      background-color:#a3a3ff;
      color:white;
      margin:10px 20px;
    }
    .shop_reservation_botton {
      background-color:#0000ff;
      color:white;
      width:100%;
      border: none;
      padding:10px 0px;
    }
  </style>
</head>
<body>
  <main class="shop_detail_contents">
    <div class="shop_detail">
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
      @foreach($details as $detail)
      <div class="shop_detail_title_block">
        <form action="/" method="get">
          @csrf
          <input class="shop_detail_return_botton" type="submit" value="<">
        </form>
        <h2 class="shop_detail_name">{{$detail->shop}}</h2>
      </div>
      <img src="{{$detail->img}}" class="shop_detail_photo">
      <p class="shop_detail_tag">#{{$detail->area->area}}#{{$detail->genre->genre}}</p>
      <p class="shop_detail_summary">{{$detail->summary}}</p>
      @endforeach
    </div>
    @empty($user->id)
    <form action="/reserve/?shop_id={{$detail->id}}" method="post" class="shop_reservation_form">
      @csrf
      <div class="shop_reservation">      
        <h3 class="shop_reservation_title">予約</h3>
        <div>
          <input type="date" name="reserve_date" class="shop_reservation_date">
        </div>
        <div>
          <input type="text" name="reserve_time" class="shop_reservation_time" id="reserveTime">
        </div>
        <div>
          <input type="text" name="number" class="shop_reservation_number">
        </div>
        <table class="shop_reservation_table">
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Shop</th>
            <td class="shop_reservation_tabel_item">{{$detail->shop}}</td>
          </tr>
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Date</th>
            <td class="shop_reservation_tabel_item">***</td>
          </tr>
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Time</th>
            <td class="shop_reservation_tabel_item">***</td>
          </tr>
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Number</th>
            <td class="shop_reservation_tabel_item">***</td>
          </tr>
      </div>
      <input class="shop_reservation_botton" type="submit" value="予約する">              
    </form> 
    @else
    <form action="/reserve/?shop_id={{$detail->id}}&user_id={{$user->id}}" method="post" class="shop_reservation_form">
      @csrf
      <div class="shop_reservation">      
        <h3 class="shop_reservation_title">予約</h3>
        <div>
          <input type="date" name="reserve_date" class="shop_reservation_date" id="reserveDate">
        </div>
        <div>
          <input type="text" name="reserve_time" class="shop_reservation_time" id="reserveTime">
        </div>
        <div>
          <input type="text" name="number" class="shop_reservation_number" id="reserveNumber">
        </div>
        <table class="shop_reservation_table">
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Shop</th>
            <td class="shop_reservation_tabel_item">{{$detail->shop}}</td>
          </tr>
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Date</th>
            <td class="shop_reservation_tabel_item" id="msgDate"></td>
          </tr>
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Time</th>
            <td class="shop_reservation_tabel_item" id="msgTime"></td>
          </tr>
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Number</th>
            <td class="shop_reservation_tabel_item" id="msgNumber"></td>
          </tr>
          <script>
            function dateChange(event){
              msgDate.innerText = reserveDate.value;
            }
            function timeChange(event){
              msgTime.innerText = reserveTime.value;
            }
            function numberChange(event){
              msgNumber.innerText = reserveNumber.value + '人';
            }
            const reserveDate = document.getElementById("reserveDate");
            reserveDate.addEventListener('change', dateChange);
            const reserveTime = document.getElementById("reserveTime");
            reserveTime.addEventListener('change', timeChange);
            const reserveNumber = document.getElementById("reserveNumber");
            reserveNumber.addEventListener('change', numberChange);
          </script>
        </table>
      </div>
      <input class="shop_reservation_botton" type="submit" value="予約する">              
    </form> 
    @endempty
  </main>
</body>
</html>