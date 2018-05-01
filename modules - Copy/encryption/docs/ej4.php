<?PHP
require_once('../AES128.php');
$aes=new AES128(false, true);
$key=$aes->makeKey("0123456789abcdef");
$ct=$aes->blockEncrypt("0123456789abcdef", $key);
$cpt=$aes->blockDecrypt($ct, $key);
echo("CipherText: $ct <br/> PlainText: $cpt <br/>");
?>