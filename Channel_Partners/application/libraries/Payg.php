<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//namespace application\libraries;
class Payg 
{
    
    public   $enc= "AES-256-CBC";
    public   $iv= "0123456789abcdef";
/*	
    public   function encrypt($text, $key) 
	{
            $size =16;
            $pad = $size - (strlen($text) % $size);
            $padtext = $text . str_repeat(chr($pad), $pad);
            $crypt = openssl_encrypt($padtext,$this->enc, base64_decode($key), OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $this->iv);  
            return base64_encode($crypt);
    }
  
    public   function decrypt($crypt, $key) 
	{
            $crypt = base64_decode($crypt); 
            $padtext =  openssl_decrypt($crypt,$this->enc, base64_decode($key), OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $this->iv); 

            $pad = ord($padtext{strlen($padtext) - 1});
            if ($pad > strlen($padtext)) {
            return false;
            }
            if (strspn($padtext, $padtext{strlen($padtext) - 1}, strlen($padtext) - $pad) != $pad) {
            $text = "Error";
            }
            $text = substr($padtext, 0, -1 * $pad);
            return $text;
    }
*/


    function encrypt($text, $key, $type)
	{ 
	$iv = "0123456789abcdef"; 
	$size =16;
	$pad = $size - (strlen($text) % $size);
	$padtext = $text . str_repeat(chr($pad) , $pad);
	$crypt = openssl_encrypt($padtext,"AES-256-CBC", base64_decode($key), OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING,$iv); 
	return base64_encode($crypt);
	}






function decrypt($crypt, $key, $type)
	{
	$iv = "0123456789abcdef";
	$crypt = base64_decode($crypt);
    $padtext = openssl_decrypt($crypt,"AES-256-CBC", base64_decode($key), OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING,$iv); 
    $pad = ord($padtext
               {
                   strlen($padtext) - 1});
    if ($pad > strlen($padtext)) return false;
    if (strspn($padtext, $padtext
               {
                   strlen($padtext) - 1}, strlen($padtext) - $pad) != $pad)
    {
        $text = "Error";
    }

    $text = substr($padtext, 0, -1 * $pad);
    return $text;
}	
	
	
	
}
