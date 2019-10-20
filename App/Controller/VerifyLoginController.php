<?php 
/**
 * 
 */
class VerifyLoginController{

	public function verify($post){
		if ((isset($post['username']))&&(isset($post['password']))&&(isset($post['g-recaptcha-response']))) {
			$username = $post['username'];
			$password = $post['password'];
			$captcha = $post['g-recaptcha-response'];
			$secreteKey = "6LfKZ74UAAAAAPf_XfwFqW2oUFLPK67xl0_pRYus";
			$pubKey = "6LfKZ74UAAAAAF2TXx7yJ_YDmI-76hHPkyPwX2dL";

			if (!$captcha) {
				$this->Session->setFlash(__('Please check the captcha form, try again.'), 'flash_error');
				$this->redirect(array('controller' => 'users', 'action' => 'register'));
			}
			$response = file("https://www.google.com/recaptcha/api/siteverify?secret=".$secreteKey."&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
			var_dump($response);
			if ($response['success'] == false) {
				echo "1";
			} 

		}
		else{
			echo "string";
		}
	}
}
?>