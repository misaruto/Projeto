<?php 
class Captcha
{
	public function validate($captcha)
	{
		$secreteKey = "6LfKZ74UAAAAAPf_XfwFqW2oUFLPK67xl0_pRYus";
		$pubKey = "6LfKZ74UAAAAAF2TXx7yJ_YDmI-76hHPkyPwX2dL";
		//Verifiva junto a google se o usuario acertou o desafio
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secreteKey."&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
		$response = json_decode($response);
		//se sim retorna true
		if ($response->success) {
			return true;
		} 
		//se não retorna false
		else{
			return false;
		}

	}
}

?>