<?php

namespace cafeterias\Core;


use cafeterias\Interfaz\IHash;

class Hash implements IHash
{
		public static function encrypt($pass)
		{
				return password_hash($pass, PASSWORD_DEFAULT);
		}

		public static function VerifyHash($passowrd, $sqlpassword)
		{

					if(password_verify($passowrd,$sqlpassword)){
							return true;
					}else{
							return false;
					}
		}
}