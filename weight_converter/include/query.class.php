<?php


class query
{
	public $units;
	public $fromm;
	public $to;
	public $submit;
	public $conn;
	public $delete;
	public $total;

	public function __construct(PDO $pdo, $units, $fromm, $to, $submit, $delete)
	{
		$this->conn = $pdo;
		$this->units = $units;
		$this->fromm = $fromm;
		$this->to = $to;
		$this->submit = $submit;
		$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$this->delete = $delete;
	}
	public function getvalue() 
	{
		if ($this->fromm == 'grame' && $this->to == 'kilograme') {

				return $this->total = $this->units/1000;

			} elseif ($this->fromm == 'kilograme' && $this->to == 'grame') {

				return $this->total = $this->units*1000;

			} elseif ($this->fromm == 'minute' && $this->to == 'ore') {

				return $this->total = $this->units/60;

			} elseif ($this->fromm == 'ore' && $this->to == 'minute') {

				return $this->total = $this->units*60;

			} elseif ($this->fromm == 'metri' && $this->to == 'kilometri') {

				return $this->total = $this->units/1000;

			} elseif ($this->fromm == 'kilometri' && $this->to == 'metri') {

				return $this->total = $this->units*1000;

			}
	}
	public function insert()
	{
		if (is_numeric($this->units)) {
			$sql = 'INSERT INTO 
					conv(units, fromm, result, too) 
					VALUES(:units, :fromm, :result, :to)'
					;
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['units' => $this->units, 'fromm' =>  $this->fromm, 'result' => $this->getvalue(),  'to' => $this->to]);
		}
		else {
			return false;
		}
	}
	public function select()
	{
		$stmt = $this->conn->query('SELECT * FROM conv');

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo '<span class="alert alert-success">'.$row['units'].' '.$row['fromm'].' => '.$row['result'].' '.$row['too'].' ==> '.$row['date'].'</span><br><br>';
		}
	}
	public function delete()
	{
		if (isset($this->delete)) {
			$sql = 'DELETE FROM conv';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

		}

	}
	public function setHistory()
	{
		if (isset($this->delete)) {
			return '<span class="alert alert-secondary">History has been deleted !</span>';
		}
	}
}