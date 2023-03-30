<?php 
	class Kriptografi{
		public function enkripsi($p){
			$char[1] = $p;
			$i = 1;
			$c = 1;

			do {
				$sq = pow($char[$i], 2)%123;
				$c *= $char[$i];
				$char[$i*2] = $sq;

				$i *= 2;
			} while ($i < 5);

			$c %= 123;
			return $c;
		}

		public function enc($data){
			$string = $data;
			$split = str_split($string);
			$enc = '';

			for ($i=0; $i < strlen($string); $i++) {
				$c = ord($split[$i]); 
				$enc .= chr($this->enkripsi($c));
			}

			return $enc;
		}

		public function dekripsi($c){
			$char[1] = $c;
			$i = 1;
			$p = 1;

			do {
				$sq = pow($char[$i], 2)%123;
				if ($i!=8) {
					$p *= $char[$i];
				}
				$char[$i*2] = $sq;

				$i *= 2;
			} while ($i < 32);

			$p %= 123;
			return $p;
		}

		public function dec($data){
			$string = $data;
			$split = str_split($string);
			$dec = '';

			for ($i=0; $i < strlen($string); $i++) {
				$p = ord($split[$i]); 
				$dec .= chr($this->dekripsi($p));
			}

			return $dec;
		}		
	}