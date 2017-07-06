sfapi
===========

A Symfony project created on July 6, 2017, 5:12 pm.

INSERT INTO `oauth2_clients` VALUES (NULL, '3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4', 'a:0:{}', '4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k', 'a:1:{i:0;s:8:"password";}');


php bin/console server:run



http://127.0.0.1:8000/oauth/v2/token?grant_type=password&client_id=1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4&client_secret=4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k&username=admin&password=admin


http://127.0.0.1:8000/oauth/v2/token?grant_type=password&client_id=1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4&client_secret=4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k&username=admin&password=admin


```
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to nginx!</title>
  </head>
  <body>
    <h1>Page test !</h1>

    <form method="post" id="login" action="#">
        <input type="submit" value="Login" />
    </form>

    <form method="get" id="getter" action="#">
      <input type="text" id="uri" value="demos" />
      <input type="submit" value="Test" />
    </form>

    <ul id="res"></ul>
  </body>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script>
    var url = 'http://127.0.0.1:8000/';
    var email = 'guy67@example.com';
    var password = 'Leroux';
    var auth;
    var authtype;

    $('#login').on( "submit", function( e ) {
      e.preventDefault();
      var request = $.ajax({
        url: url + "oauth/v2/token",
        method: "POST",
        data: { grant_type : 'password', client_id: '1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4', client_secret: '4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k', username: 'admin', password: 'admin' },
        dataType: "json"
      });
 
      request.done(function( data ) {
        result(data);
      });

      request.fail(function( data ) {
        result(data);
      });
    });

    $('#getter').on( "submit", function( e ) {
      e.preventDefault();
      var uri = $(this).find('#uri').val();
      console.log('**');
      console.log(auth);
      console.log('**');
      var request = $.ajax({
        url: url + uri,
        method: "get",
        beforeSend: function(xhr){
          xhr.setRequestHeader( 'Authorization', 'BEARER ' + auth  );
        },

        dataType: "json"
      });
 
      request.done(function( data ) {
        result(data);
      });

      request.fail(function( data ) {
        result(data);
      });
    });

    function result(data) {
      $('#res').html('');
     if (data.responseText) {
          data = data.responseText;
          $('#res').append( '<li><strong>'+data+'</strong></li>' )
          return;
      } 
      $.each(data, function(index, value) {
        if (index === 'access_token') {
          auth = value;
        }
        if (index === 'token_type') {
          authtype = value;
        }
        $('#res').append( '<li><strong>'+index+'</strong> '+value+'</li>' );
      });
    }
  </script>

</html>

```
