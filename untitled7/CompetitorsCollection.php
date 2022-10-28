<?php

class CompetitorsCollection
{
    public $competitors;

    public function __construct()
    {
    }

    public function defaultCompetitors()
    {
        $this->competitors = [
            new Competitor(1, [
                'id' => 1,
                'name' => "Nika",
                'sex' => "female",
                'age' => 18,
                'country' => "ua",
                'marks' => "10 10 10"
            ]),
            new Competitor(2, [
                'id' => 2,
                'name' => "Oleg",
                'sex' => "male",
                'age' => 32,
                'country' => "uk",
                'marks' => "4 9 2"
            ]),
            new Competitor(3, [
                'id' => 3,
                'name' => "Mika",
                'sex' => "female",
                'age' => 439,
                'country' => "sk",
                'marks' => "5 7 3"
            ]),
            new Competitor(4, [
                'id' => 4,
                'name' => "Ivan",
                'sex' => "male",
                'age' => 12,
                'country' => "us",
                'marks' => "2 8 5"
            ])
        ];
        return $this;
    }

    public function getCompetitorById($id)
    {
        foreach ($this->competitors as $competitor) {
            if ($competitor->id == $id) {
                return $competitor;
            }
        }
        return null;
    }

    public function filterCompetitors($country, $age)
    {
        return array_filter(
            $this->competitors,
            function ($value) use ($country, $age) {
                return ($value->country == $country and $value->age > $age);
            }
        );
    }

    public function addCompetitor($competitor)
    {
        $this->competitors[] = $competitor;
    }

    public function editCompetitor($array)
    {
        $competitor = $this->getCompetitorById($array['id']);
        if (!(empty($competitor))) {
            $competitor->name = $array['id'];
            $competitor->sex = $array['sex'];
            $competitor->age = $array['age'];
            $competitor->country = $array['country'];
            $competitor->marks = $array['marks'];
        }
    }

}











//    public function saveCompetitors()
//    {
//        $file = fopen("competitors.txt", "w");
//        fwrite($file, serialize($this->competitors));
//        fclose($file);
//    }
//
//    public function loadCompetitors()
//    {
//        $this->competitors = unserialize(file_get_contents("competitors.txt"));
//    }
//
//    public function displayCompetitors()
//    {
//        $table = '<table>';
//        $table .= "<caption> Competitors </caption>";
//        $table .= '<tr> <th>id</th> <th>name</th> <th>sex</th> <th>age</th> <th>country</th> <th>marks</th> </tr>';
//
//        foreach ($this->competitors as $item) {
//            $table .= "<tr><td>$item->id</td><td>$item->name</td><td>$item->sex</td>" .
//                "<td>$item->age</td><td>$item->country</td><td>$item->marks</td></tr>";
//        }
//
//        $table .= '</table>';
//        return $table;
//    }
//
//    public function displayFilteredCompetitors($country, $age)
//    {
//        $array = $this->filterCompetitors($country, $age);
//        $table = '<table>';
//        $table .= "<caption> Competitors </caption>";
//        $table .= '<tr> <th>id</th> <th>name</th> <th>sex</th> <th>age</th> <th>country</th> <th>marks</th> </tr>';
//
//        foreach ($array as $item) {
//            $table .= "<tr><td>$item->id</td><td>$item->name</td><td>$item->sex</td>" .
//                "<td>$item->age</td><td>$item->country</td><td>$item->marks</td></tr>";
//        }
//
//        $table .= '</table>';
//        return $table;
//    }
//}