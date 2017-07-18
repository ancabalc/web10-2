<?php
class externalHelp {

  function signUpSender($name,$message,$email){
    $curl = curl_init();


    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"to\":[{\"email\":\"".$email."\",\"name\":\"".$name."\"}],\"subject\":\"Sign Up web-10\"}],\"from\":{\"email\":\"web-10-signUp@test.com\",\"name\":\"Sam Smith\"},\"reply_to\":{\"email\":\"web-10-signUp@test.com\",\"name\":\"Sam Smith\"},\"subject\":\"Sign Up web-10\",\"content\":[{\"type\":\"text/html\",\"value\":\"<html><p>".$message."</p></html>\"}]}",
      CURLOPT_HTTPHEADER => array(
        "authorization: Bearer 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",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

}
}