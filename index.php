<?php
/*1. 4. Об’єкт “Турнір” (Код, ПІБ; стать; вік; назва країни, за яку він виступає; оцінки по трьох видах змагань). Запит учасників з країни Х, вік яких не менший за Y.*/
session_start();
$_SESSION["accounting"] = null;
if (isset($_SESSION["accounting"])){
    $accounting = $_SESSION["accounting"];
}else{
    $accounting = [
        [
            'code'=> 1,
            'fullname' => "Nika Andriivna Otter",
            'sex' => "female",
            'age'=>18,
            'country'=> "ua",
            'marks'=>"10 10 10"
        ],
        [
            'code'=> 2,
            'fullname' => "Oleg Ivanovich Kot",
            'sex' => "male",
            'age'=>32,
            'country'=> "uk",
            'marks'=>"4 9 2"
        ],
        [
            'code'=> 3,
            'fullname' => "Mika Michalivna Kit",
            'sex' => "female",
            'age'=>43,
            'country'=> "sk",
            'marks'=>"5 7 3"
        ],
        [
            'code'=> 4,
            'fullname' => "Ivan Ivanovich Ferret",
            'sex' => "male",
            'age'=>12,
            'country'=> "us",
            'marks'=>"2 8 5"
        ],
    ];
}
function getId($accounting){
    for($i = 0; $i < count($accounting); $i++){
        if($_GET["id"] == $accounting[$i]["code"]){
            $max = $accounting[0]["code"];
            for($j = 0; $j < count($accounting); $j++){
                if($accounting[$j]["code"] > $max){
                    $max = $accounting[$j]["code"];
                }
            }
            $max++;
            return $max;
        }
    }
    return $_GET["code"];
}
if($_GET["edit"] != null){
    for($i = 0; $i < count($accounting); $i++){
        if($_GET["edit"] == $accounting[$i]["code"]){
            $accounting[$i] = ["code" => getId($accounting),
                "fullname" => $_GET["fullname"],
                "sex" => $_GET["sex"],
                "age" => $_GET["age"],
                "country" => $_GET["country"],
                'marks' => $_GET['marks']];
            $_SESSION["accounting"] = $accounting;
            break;
        }
    }

}
else{
    if($_GET["code"] == null){
        $_GET["code"] = 1;
    }
    if($_GET["fullname"] == null){
        $_GET["fullname"] = "None fullname";
    }
    if($_GET["sex"] == null){
        $_GET["sex"] = "non-binary";
    }
    if($_GET["age"] == null){
        $_GET["age"] = "0";
    }
    if($_GET["country"] == null){
        $_GET["country"] = "None country";
    }
    if($_GET["marks"] == null){
        $_GET["marks"] = "0 0 0";
    }

    $accounting[] = ["code" => getId($accounting),
        "fullname" => $_GET["fullname"],
        "sex" => $_GET["sex"],
        "age" => $_GET["age"],
        "country" => $_GET["country"],
        "marks" => $_GET["marks"]];
    $_SESSION["Competition"] = $accounting;
}
function getMemberByCountryAndByAge($arr, $country,$age){
    $newArr = [];
    for($i = 0; $i < count($arr); $i++){
        if($country == $arr[$i]["country"] && $arr[$i]["age"] > $age){
            array_push($newArr, $arr[$i]);

        }
    }
    return $newArr;
}

echo "<h2>Таблиця всіх значень</h2>";
echo "<table>";
echo "<tr> <th>Code</th> <th>Fullname</th> <th>Sex</th> <th>Age</th> <th>Country</th> <th>Marks</th> </tr>";
for($i = 0; $i < count($accounting); $i++){
    echo "<tr>";
    foreach ($accounting[$i] as $key=>$value){
        if($value != null){
            echo "<td>$value</td>";
        }

    }

    echo "</tr>";
}
echo "</table>";

$arr = getMemberByCountryAndByAge($accounting,"ua",15);
echo "<h2>Таблиця запиту</h2>";
echo "<table>";
echo "<tr> <th>Code</th> <th>Fullname</th> <th>Sex</th> <th>Age</th> <th>Country</th> <th>Marks</th> </tr>";
for ($i = 0; $i < count($arr); $i++) {
    echo "<tr>";
    foreach ($arr[$i] as $key => $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";


?>
<style>
    table{
        border: 1px solid hotpink;
    }
    th,tr,td{
        border: 1px solid pink;
    }
</style>

<form method="get" action="">
    <p>Form</p>
    <label>
        <input type="number" name="edit" placeholder="Type id for edit"> <br>
        <input type="number"  name="code" placeholder="Code"> <br>
        <input type="text"  name="fullname" placeholder="Fullname"> <br>
        <input type="text" name="sex" placeholder="Sex"> <br>
        <input type="number" name="age"  placeholder="Age"> <br>
        <input type="text" name="country" placeholder="Country"><br>
        <input type="text" name="marks" placeholder="Marks"><br>
        <input type="submit" name="btn-ok" value="ok">


        <input type="hidden" name="z-children" value="">
        <input type="hidden" name="z-state" value="">
    </label>
</form>