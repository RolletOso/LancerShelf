<?PHP
require_once('../AES128.php');
$aes=new AES128(true);
$key=$aes->makeKey("0123456789abcdef");
$ct=$aes->blockEncrypt("0123456789abcdef", $key);
echo("CipherText: $ct");
?>