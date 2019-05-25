<?php 

class calcul 
{
	public $from;
	public $to;
	public $submit;
	public $units;
	public function __construct ($from, $to, $submit, $units)
	{
		$this->from = $from;
		$this->to = $to;
		$this->submit = $submit;
		$this->units = $units;
	}

	public function calcule()
	{
		if (isset($this->from) && isset($this->to) && isset($this->submit) && !empty($this->units)) {

			if ($this->from == 'grame' && $this->to == "kilograme") {

				$total = $this->units/1000;
				return "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";

			} elseif ($this->from == 'kilograme' && $this->to == "grame") {

				$total = $this->units*1000;
				return "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";

			} elseif ($this->from == 'minute' && $this->to == "ore") {

				$total = $this->units/60;
				return "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";

			} elseif ($this->from == 'ore' && $this->to == "minute") {

				$total = $this->units*60;
				return "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";

			} elseif ($this->from == 'metri' && $this->to == "kilometri") {

				$total = $this->units/1000;
				return "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";

			} elseif ($this->from == 'kilometri' && $this->to == "metri") {

				$total = $this->units*1000;
				return "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";

			} else {
				return header("Location: index.php?info=error");
			}
		}
	}
}


		// if (is_numeric($this->units) &&	!is_null($this->units) && isset($this->submit)) {
		// 	$this->total = $total;
		// 	switch ($this->from | $this->to) {
		// 		case $this->from == 'grame' && $this->to == "kilograme":
		// 			$total = $this->units/1000;
		// 			$this->calc =  "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";
		// 			break;
		// 		case $this->from == 'kilograme' && $this->to == "grame":
		// 			$total = $this->units*1000;
		// 			$this->calc =  "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";
		// 			break;
		// 		case $this->from == 'minute' && $this->to == "ore":
		// 			$total = $this->units/60;
		// 			$this->calc =  "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";
		// 			break;
		// 		case $this->from == 'ore' && $this->to == "minute":
		// 			$total = $this->units*60;
		// 			$this->calc =  "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";
		// 			break;
		// 		case $this->from == 'metri' && $this->to == "kilometri":
		// 			$total = $this->units/1000;
		// 			$this->calc =  "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";
		// 			break;
		// 		case $this->from == 'kilometri' && $this->to == "metri":
		// 			$total = $this->units*1000;
		// 			$this->calc =  "Raspuns: {$this->units} {$this->from} = ".$total." {$this->to} !";
		// 			break;
				
		// 		default:
		// 			return header('Location: index.php?info=error');
		// 	}
		// 	return $this->calc;
		// }
		// else {
		// 	return false;
		// }