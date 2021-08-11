<!DOCTYPE html>
<html>
  <head>
    <title>Facebook Login JavaScript Example</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="web-page-css.css">

  </head>
  <body class="login-body">

    <script>

      function statusChangeCallback(response) {  
        console.log('statusChangeCallback');
        console.log(response);                   
        if (response.status === 'connected') {   
          window.location.replace("http://localhost/richpanel/");  
        } else {                                 
          document.getElementById('status').innerHTML = 'Please log ' +
            'into this webpage.';
        }
      }


      function checkLoginState() {               
        FB.getLoginStatus(function(response) {  
          statusChangeCallback(response);
        });
      }


      window.fbAsyncInit = function() {
        FB.init({
          appId      : '2040411332765650',
          cookie     : true,                     
          xfbml      : true,                     
          version    : 'v11.0'           
        });


        FB.getLoginStatus(function(response) {   
          statusChangeCallback(response);        
        });
      };

    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=2040411332765650&autoLogAppEvents=1" nonce="umWWG6jo"></script>

    <div class="login-container">

      <p>FaceBook Login</p>

      <div class="fb-login-button" data-size="medium" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
      <br><br>

      <div id="status">
      </div>
    </div>

    <!-- Load the JS SDK asynchronously -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    
  </body>
</html>