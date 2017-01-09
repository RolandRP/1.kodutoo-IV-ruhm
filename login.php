<?php

//var_dump($_GET);

//echo "<br>";

var_dump($_POST);


$signupFirstNameError = "";

//kas kasutaja sisestas eesnime

if (isset ($_POST["signupFirstName"])) {

  // on olemas
  // kas eesnimi on tühi
    if (empty ($_POST["signupFirstName"])) {

    //on tühi
      $signupFirstNameError = "Väli on kohustuslik!";
   }
 }

 $signupLastNameError = "";

 //kas kasutaja sisestas perekonnanime

 if (isset ($_POST["signupLastName"])) {

   // on olemas
   // kas perekonnanimi on tühi
     if (empty ($_POST["signupLastName"])) {

     //on tühi
       $signupLastNameError = "Väli on kohustuslik!";
    }
  }

$signupEmailError = "";

  // kas kasutaja vajutas nuppu ja see on olemas

if (isset ($_POST["signupEmail"])) {

  // on olemas
  // kas epost on tyhi
    if (empty ($_POST["signupEmail"])) {

    //on tyhi
      $signupEmailError = "Väli on kohustuslik!";
    }
  }

// kas password on tühi:

$signupPasswordError = "";

// kas kasutaja vajutas nuppu ja see on olemas:

if (isset ($_POST["signupPassword"])) {

    //on olemas
    //kas e-post on tühi:
    if (empty ($_POST["signupPassword"])) {

      //on tühi
        $signupPasswordError = "Väli on kohustuslik!";
    } else {

			// parool ei olnud tühi

			if ( strlen($_POST["signupPassword"]) < 8 ) {

				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";

			}

		}
  }

$recaptchaError = "";
if (isset ($_POST["g-recaptcha-response"])) {
  if (empty ($_POST["g-recaptcha-response"])) {
    $recaptchaError = "Recaptcha on kohustuslik!";
  }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
      <title>Sisselogimise leht</title>

      <script src='https://www.google.com/recaptcha/api.js'></script>

  </head>

  <body>
    <style>
      input {
        width: 80%;
      }
      h4 {
        text-decoration: none;
        margin: 0 2 0 2;
      }
      h3 {
        color: red;
        margin: 2 0 2 0;
      }
    </style>

    </svg>
    <div style="width: 90%; margin: 10px; display: block;">
      <div style="width: 40%; margin: auto; position: relative; display: block; float: right;">

        <h1>Logi sisse</h1>

        <form method="POST">

          <placeholder>E-post</placeholder><br>
          <input name="loginEmail" type="email">

          <br><br>

          <placeholder>Password</placeholder><br>
          <input name="loginPassword" type="password">

          <br> <br>

          <input type="submit" value="Logi sisse">
        </form>
      </div>

      <div style="width: 40%; margin: auto; float: left; position: relative; display: block;">
        <h1>Loo kasutaja</h1>

        <form method="POST">

          <h4>Eesnimi *</h4>
          <input name="signupFirstName" type="text" placeholder="Eesnimi"> <br>
          <h3><?php echo $signupFirstNameError; ?></h3>

          <br>

          <h4>Perekonnanimi *</h4>
          <input name="signupLastName" type="text" placeholder="Perekonnanimi"> <br>
          <h3><?php echo $signupLastNameError; ?></h3>

          <br>

          <h4>E-post *</h4>
          <input name="signupEmail" type="email" placeholder="E-post"> <br>
          <h3><?php echo $signupEmailError; ?></h3>

          <br>

          <h4>Parool *</h4>
          <input name="signupPassword" type="password" placeholder="Parool"> <br>
          <h3> <?php echo $signupPasswordError; ?></h3>

          <br>

          <h4>Recaptcha *</h4>
          <div class="g-recaptcha" data-sitekey="6LddChEUAAAAAIcvNOBubFQiAfmRToXPF7XvXy3_" style="width: 80%;"></div> <br>
          <h3><?php echo $recaptchaError; ?></h3>

          <br>
          <h3>* Kohustuslikud väljad!</h3>
          <br>

          <input type="submit" value="Loo kasutaja">

          <br><br>

        </form>
      </div>
    </div>
  </body>
</html>
