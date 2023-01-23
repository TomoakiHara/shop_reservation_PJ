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
      <div class="menu_block">
        <div class="menu_link">
          <span class="menu_line--top"></span>
          <span class="menu_line--middle"></span>
          <span class="menu_line--bottom"></span>
        </div>
        <h1 class="icon">Rese</h1>
      </div>
      <div class="shop_detail_title_block">
        <form action="/" method="get">
          @csrf
          <input class="shop_detail_return_botton" type="submit" value="<">
        </form>
        <h2 class="shop_detail_name">仙人</h2>
      </div>
      <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" class="shop_detail_photo">
      <p class="shop_detail_tag">###</p>
      <p class="shop_detail_summary">+++</p>
    </div>
    <form action="/reserve" method="post" class="shop_reservation_form">
      @csrf
      <div class="shop_reservation">      
        <h3 class="shop_reservation_title">予約</h3>
        <div>
          <input type="date" class="shop_reservation_date">
        </div>
        <div>
          <input type="text" class="shop_reservation_time">
        </div>
        <div>
          <input type="text" class="shop_reservation_number">
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
      <input class="shop_reservation_botton" type="submit" value="予約する">              
    </form> 
  </main>
</body>
</html>