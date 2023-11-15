<?php 
require 'vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;

class Auth {
    /**
     * @var OpenIDConnectClient oidc client
     */
    public $google_flag = 'google';
    public $ms_flag = 'ms';

    private $ms_issuer = 'https://sts.windows.net/4f275729-62e4-408f-8860-d8f34b00347b/';
    private $ms_cid = '69034bac-40eb-438b-8e3f-cbfd5738ba46';
    private $ms_secret = 'Y3Z8Q~ZiGFCBUo~kA.lT8kLxT~eF_FtBGl2V7bmZ';
    private $ms_login_redirect_uri = 'https://wonderstar.sg-mt.net/php/mslogin.php';

    private $google_issuer = 'https://accounts.google.com/';
    private $google_cid = '7253951038-qoh0g67v8807o1mp5ucsf18691hvltq5.apps.googleusercontent.com';
    private $google_secret = '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';
    private $google_login_redirect_uri = 'https://wonderstar.sg-mt.net/php/glogin.php';

    private $oidc;
    
    public $display_name;

    public function login($provider) {
        if ($provider === $this->google_flag) {
            $oidc = new OpenIDConnectClient($this->google_issuer, $this->google_cid, $this->google_secret);
            $oidc->setRedirectURL($google_login_redirect_uri);
        } else if ($provider === $this->ms_flag) {
            $oidc = new OpenIDConnectClient($this->ms_issuer, $this->ms_cid, $this->ms_secret);
            $oidc->setRedirectURL($ms_login_redirect_uri);
        }

        $oidc->addScope(array('openid', 'profile', 'email'));
        $oidc->addAuthParam(array('prompt' => 'select_account'));
        $this->oidc = $oidc;

        $this->oidc->authenticate();
        $this->setIdToken($this->oidc->getIdToken());
        $this->setUser($this->oidc->requestUserInfo());
    }

    public function logout() {
        unset($_SESSION['idToken']);
        unset($_SESSION['user']);
    }

    public function getIdToken() {
        return $_SESSION['idToken'];
    }

    public function getUser() {
        return $_SESSION['user'];
    }
    
    public function isLoggedIn() {
        return $this->getUser() !== null;
    }

    private function setIdToken($idToken)
    {
        $_SESSION['idToken'] = $idToken;
    }

    private function setUser($user) {
        $_SESSION['user'] = $user;
    }
}

session_start();
$auth = new Auth();
?>