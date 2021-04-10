<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Variables</h3>
	<?php
		$name = 'Alex';
		echo "Hello $name"."<br>"; 

		$a = 10;
		$b = '002';
		echo $a.$b."<br>";
		echo $a+$b."<br>";

		if (isset($name))
			echo "\$name is exist<br>";
		unset($name);
		if (!isset($name))
			echo "Now \$name doesn't exist anymore!<br>";

		if (is_string($a))
			echo "\$a is a string<br>";
		elseif (is_int($a))
			echo "\$a is an integer<br>";

		
		$b = intval($b);
		if (is_int($b))
			echo "\$b is an integer now!<br>";

		$c = 325;
		echo (boolean)$c."<br>";


		$ref = "a"; // contain name of the other variable
		echo $$ref;


		$d = 25;
		$e = "25";
		if ($d == $e)
			echo "<br>Equal. Maybe<br>";
		if ($d === $e)
			echo "Something went wrong";
		elseif ($d !== $e)
			echo "True. int not equivalent to string!";
	?>

	<h3>Foreach - hash array</h3>

	<?php 
		foreach ($_SERVER as $key => $value) {
			echo "<b>$key</b> => $value<br>\n";
		}
		echo "<br><br>";


		$names = ["Spencer" => "Hugo", "Smith" => "John"];
		foreach ($names as $key => $value) {
			echo "$key => $value<br>";
		}
		echo "EDITED<br>";
		foreach ($names as $ke => &$val) {   // edit array
			if ($ke == "Spencer")
				$val = "HUGO NEW";
		}
		foreach ($names as $kk => $vv) {
			echo "$kk => $vv<br>";
		}


		echo "<br><br>";

		$data = [
			"Barbara" => ["name" => "Joe", "born" => "1982-09-18"],
			"Levin" => ["name" => "Ken", "born" => "1989-06-24"],
		];
		foreach ($data as $k => $v) {
			echo $k." ".$data[$k]["name"]."  ";
			echo $data[$k]["born"]."<br>";
		}
	?>		

	<h3>explode() -- implode()</h3>

	<?php 
		$str = "0124+Benn Hanson+1976-04-28+information about me";
		$client1 = explode("+", $str, 4);
		list ($sesId, $name, $birth, $info) = $client1;
		echo "ID: $sesId"."<br>"."Name: $name"."<br>"."Birthday: $birth"."<br>"."Info: $info"."<br><br>";

		$newStr = implode("##", $client1);
		echo $newStr."<br>";
	 ?>

	<h3>Class</h3>

	<?php
		class Rectangle {
            private static $counter = 0;
			private $a;
			private $b;
			function __construct($a = 0, $b = 0) {
                self::$counter++;
				$this->a = $a;
				$this->b = $b;
                echo self::$counter." objects have already created<br>";
			}
            public function __destruct() {
                echo "##Deleting an object!<br>";
            }
			public function area() {
				echo "Area of the rectangle: ".($this->a * $this->b)."<br>";
			}
			public function getA() { return $this->a; }
            public function getB() { return $this->b; }
		}

		$obj = new Rectangle(4, 5);
		$obj->area();

    class Triangle extends Rectangle {
        private $c;
        public function __construct($a = 0, $b = 0, $c = 0) {
            parent::__construct($a, $b);
            $this->c = $c;

        }
        public function area() {
            $a = $this->getA();
            $b = $this->getB();
            $p = ($a + $b + $this->c) / 2;
            $ar = ($p * ($p - $a) * ($p - $b) * ($p - $this->c)) ** 0.5;
            echo "Area of the triangle: {$ar}<br>";
        }
    }

    $derobj = new Triangle(3, 4, 6);
    $derobj->area();
	 ?>

    <h3>Singleton</h3>

    <?php
        class Singleton {
            private static $instance = null;
            private $fd;
            private function __construct() {
                $this->fd = fopen('log1.txt', 'a');
            }
            private function __destruct() {
                fclose($this->fd);
            }
            public static function getInstance() {
                return self::$instance === null ? self::$instance = new static() : self::$instance;
            }
            public function writeLog($msg) {
                fwrite($this->fd, date('Y-m-d').": $msg\n");
            }
        }

        $single = Singleton::getInstance();
        $single->writeLog("New note.");

    ?>

</body>
</html>