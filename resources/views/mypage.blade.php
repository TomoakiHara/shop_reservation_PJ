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

    .mypage_contents {
      display: flex;
      justify-content: space-around;
    }
    .reservation_statues {
      width:50vw;
      margin:20px 20px;
    }
    .favorite_shop_list {
      width:50vw;
      margin:20px 20px;
    }


    .reservation_statues_block {
      background-color: #0000ec;
      padding:20px 20px; 
    }
    

    .mypage_reservation_icon_block {
      display: flex;
      justify-content: space-between;
    }
    .mypage_reservation_icon_block_left {
      display: flex;
      justify-content: flex-start;
    }

  </style>
</head>
<body>
  <header class="header_mypage">
    <div class="menu_block">
      <div class="menu_link">
        <span class="menu_line--top"></span>
        <span class="menu_line--middle"></span>
        <span class="menu_line--bottom"></span>
      </div>
      <h1 class="icon">Rese</h1>
    </div>
  </header>
  <main class="mypage_contents">
    <div class="reservation_statues">
      <h3 class="reservation_statues_title">予約状況</h3>
      <div class="reservation_statues_block">
        <div class="mypage_reservation_icon_block">
          <div class="mypage_reservation_icon_block_left">
            <div class="mypage_resercation_icon"></div>
            <p class="mypage_reservation_title">予約1</p>
          </div>
          <form action="cancel" method="get">
            <input class="shop_detail_return_botton" type="submit" value="×">
          </form>
        </div>
      </div>
      <table class="shop_reservation_table">
          <tr class="shop_detail_table_row">
            <th class="shop_reservation_table_title">Shop</th>
            <td class="shop_reservation_tabel_item">***</td>
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
      </table>    
    </div>  
    <div class="favorites_shop_list">
      <h2 class="login_user">testさん</h2>
      <h3 class="favorite_shop_title">お気に入り店舗</h3>
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
    </div>
  </main>
</body>   
</html>