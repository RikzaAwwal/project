<?php 
	$pt = "082262656527";
	// $ct = '?"2]{??upZm~lj?';
	$chiper_algo = "aes-128-ecb";
	$pw ="stikomcirebonidn";
	$opsi= 0;

	if (strlen($pt) % 8) {
    $pt = str_pad($pt, strlen($pt) + 8 - strlen($pt) % 8, "\0");
}

$chiperRaw = openssl_encrypt($pt, "aes-128-ecb", $pw, OPENSSL_NO_PADDING);

$ciphertext = trim($chiperRaw);

echo nl2br($ciphertext."\r\n");


$chiperdec = openssl_decrypt($ciphertext, "aes-128-ecb", $pw, OPENSSL_NO_PADDING);

echo $chiperdec;
 ?>