<?php
$config = require_once 'config.php';
class DataBase
{
	private $link;
	public function __construct($config)
	{
		$this->connection($config);
	}
	public function connection ($config)
	{
		
		try{
			$dsn = 'mysql:host=127.0.0.1:3306;dbname='.$config['db_name'];
		$this->link = new PDO($dsn, $config['user'], $config['db_password']);
		}
		catch(PDOException $ex){
			var_dump($es);
		}
		

		return $this;
	}
	public function get($sql, $parametrs = [])
	{
		$sth = $this->link->prepare($sql);

		$result = $sth->execute($parametrs);

		if ($result == true) {
			return $sth->fetchAll();
		}
		return [];

	}
	public function query($sql)
	{
		$exe = $this->execute($sql);

		$result = $exe->fetchAll();

		if ($result == false) {
			return[];
		}

		return $result;
	}
}	

$db = new DataBase($config);