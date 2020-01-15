<?php

/**
 * Cow Class
 */
class Cows
{
	public $id;

	//Задаем id для коров
	function __construct($id)
	{
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}

	//Получаем случайное значение выдачи молока
	function getMilk(){
		return rand(8, 12);
	}
}

/**
 * Egg
 */
class Egg
{
	private $id;

	//Задаем id для куриц
	function __construct($id)
	{
		$this->id = $id;
	}

	//получаем случайное значение яиц 
	function getEgg(){
		return rand(0,1);
	}
}

/**
 * Farm Class
 */
class Farm
{
	public $cows = [];
	public $chick = [];

	public function __construct($cows = [], $chick = []){
	   $this->cows = $cows;
	   $this->chick = $chick;
	}

	//Добавляем коров в хлев
	public function addCow(Cows $cow){
		array_push($this->cows, $cow);
	}

	//Добавляем куриц в хлев
	public function addChick(Egg $chick){
		array_push($this->chick, $chick);
	}

	//Собираем молоко и сразу же суммируем все значения массива
	public function harvestMilk(){
		$milkSum = 0; 

		foreach ($this->cows as $cow) {
			$milkSum += $cow->getMilk();
		}

		return $milkSum;
		
	}

	//Собираем яйца и также суммируем все значения массива
	public function harvestEgg(){
		$eggSum = 0;

		foreach ($this->chick as $chickVal) {
			$eggSum += $chickVal->getEgg();
		}

		return $eggSum;
	}
}

$farm = new Farm();
 
//Добавляем 10 коров в массив
for ($i=0; $i < 10; $i++) { 
	$cow = new Cows($i);
	$farm->addCow($cow);
}
echo (count($farm->cows) == 10)?'Все коровы добавлены в хлев<br/>':'Ошибка! Не все коровы в хлеве<br/>'; //Выводим сообщение о загоне коров

//Добавляем 20 куриц в массив
for ($i=0; $i < 20; $i++) { 
	$chick = new Egg($i);
	$farm->addChick($chick);
}
echo (count($farm->chick) == 20)?'Все курицы добавлены в хлев<br/>':'Ошибка! Не все курицы в хлеве'; //Выводим сообщение о загоне куриц

echo "Молоко -".$farm->harvestMilk()."<br/>"; //Выводим сколько надоили молока
echo "Яйца - ".$farm->harvestEgg()."<br/>"; // Сколько собрали яиц


?>

