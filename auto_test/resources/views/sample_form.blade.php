<!DOCTYPE html>
<html>
<head>
  <title>お問い合わせフォーム</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

</head>
<body>
  <div class="container">
    <div class="row">
    <div class="col-md-8 mx-auto">
    <h1 class="mt-5 text-center">お問い合わせフォーム</h1>
    
    <form action="./send_form" method="POST" class="row g-3 h-adr pt-3">
     <span class="p-country-name" style="display:none;">Japan</span>
    @csrf
      <div class="mb-3">
        <label for="name" class="form-label">氏名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3 ">
        <label for="nameKana" class="form-label">氏名（かな）</label>
        <input type="text" class="form-control" id="nameKana" name="nameKana">
      </div>
      <div class="mb-3 ">
        <label for="email" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3 ">
        <label for="phone" class="form-label">電話番号</label>
        <input type="tel" class="form-control" id="phone" name="phone">
      </div>
      <div class="mb-3 ">
        <label for="postalCode" class="form-label">郵便番号</label>
        <input type="text" class="form-control  p-postal-code" id="postalCode" name="postalCode">
      </div>
      <div class="mb-3 ">
        <label for="prefecture" class="form-label">都道府県</label>
        <input type="text" class="form-control p-region" id="prefecture" name="prefecture">
      </div>
      <div class="mb-3 ">
        <label for="city" class="form-label">市区町村</label>
        <input type="text" class="form-control p-locality p-street-address" id="city" name="city">
      </div>
      <div class="mb-3 ">
        <label for="address" class="form-label">番地・建物</label>
        <input type="text" class=" form-control p-extended-address" id="address" name="address">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">お問い合わせ内容</label>
        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">送信</button>
    </form>
    </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").on("submit", function(event){
    event.preventDefault();//フォームの通常の送信をキャンセル

    var formData = $(this).serialize();

    $.ajax({
      url: "./send_form",
      type: "POST",
      data: formData,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response){
        //ここに成功時の処理を書く。responseにはサーバーからのレスポンスデータが含まれる
        console.log(response);
      },
      error: function(jqXHR, textStatus, errorThrown){
        //ここにエラー時の処理を書く
        console.log(textStatus, errorThrown);
      }
    });
  });
});
</script>
</body>
</html>
