<?php
require_once(__DIR__ . "/Misc/document_access.php");
//require_once(__DIR__ . "/Misc/https_handler.php");
require_once(__DIR__ . "/Misc/session.php");

#Put 1 to enable show error or otherwise put 0.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("AES_PASSWORD", md5(".kjfgn/laksg/lkasjgk;ljasljlasjflkasjlfjaslkfjklasjflajs;flkja;lfkaslkfdj;lasfd"));

define("TOKEN",  "WEB:" . $_SERVER['REMOTE_ADDR']. ":" . (F::GetTime() + (60 * 15)));

$ipdate = TOKEN;
$pass = (AES_PASSWORD);
$iv = Encrypter::CreateIv();
base64_encode($iv);

$encrypt = Encrypter::AESEncrypt($ipdate, $pass, $iv);
$input = base64_encode($iv) . ":" . base64_encode($encrypt);
define("TOKEN_SECURE", $input);

define("PORTAL_PUBLIC", "https://www.mypro-intelligent.com/");
define("PORTAL_MASTER", "https://www.mypro-intelligent.com/master/");
define("PORTAL_ADMIN", "https://www.mypro-intelligent.com/admin/");
define("PORTAL_API", "https://www.mypro-intelligent.com/api/");

#IPStack Setup
define("IPSTACK", "cd7c9139c0be306232a864030bea9814");

define("UNIQUE", hash("sha256", time() . F::UniqKey() . $_SERVER["REMOTE_ADDR"] . rand(10000, 99999)));

//header('Cache-Control: no-cache');

//header('X-Frame-Options: SAMEORIGIN');

//header("X-Content-Type-Options: nosniff");

//header("X-XSS-Protection: 1; mode=block");

//header("Strict-Transport-Security: max-age=31536000");

//header("Set-Cookie: SameSite=Lax");
//header("Content-Security-Policy: default-src * 'self' https://myiecommerce.intelpro.com.my/*; style-src 'self' 'unsafe-inline' https://myiecommerce.intelpro.com.my/ https://cdnjs.cloudflare.com/ https://fonts.googleapis.com/ https://maxcdn.bootstrapcdn.com/ https://cdn.datatables.net/; script-src * 'self' 'unsafe-inline' 'unsafe-eval' https://myiecommerce.intelpro.com.my/ https://www.paypal.com/ https://cdn.datatables.net/ https://cdnjs.cloudflare.com/; img-src 'self' data: https://myiecommerce.intelpro.com.my/;");


