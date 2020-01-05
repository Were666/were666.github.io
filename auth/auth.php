<?php
    $app_id = $_POST['app_id'];
    $app_secret = $_POST['app_secret'];
    $redirect_url = $_POST['redirect_url'];
    $code = $_POST['code'];

    $data = array('app_id' => $app_id, 'app_secret' => $app_secret, 'grant_type' => 'authorization_code', 'redirect_url' => $redirect_url);

	$cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, "https://api.instagram.com/oauth/access_token");
    curl_setopt($cliente, CURLOPT_POST, 1);
    curl_setopt($cliente, CURLOPT_POSTFIELDS, "app_id=".$app_id);
    curl_setopt($cliente, CURLOPT_POSTFIELDS, "app_secret=".$app_secret);
    curl_setopt($cliente, CURLOPT_POSTFIELDS, "grant_type=authorization_code");
    curl_setopt($cliente, CURLOPT_POSTFIELDS, "redirect_uri=".$redirect_url);
    //curl_setopt($cliente, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($cliente, CURLOPT_CUSTOMREQUEST, "POST");

	//curl_setopt($cliente, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

	$contenido = curl_exec($cliente);
    curl_close($cliente);
    
    echo $contenido;

    //curl -X POST \ https://api.instagram.com/oauth/access_token \ -F app_id={app-id} \ -F app_secret={app-secret} \ -F grant_type=authorization_code \ -F redirect_uri={redirect-uri} \ -F code={code}
?>