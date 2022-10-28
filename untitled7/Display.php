<?php

class Display

{
    public function displayCompetitors($array)
{
    $table = '<table>';
    $table .= "<caption> Competitors </caption>";
    $table .= '<tr> <th>id</th> <th>name</th> <th>sex</th> <th>age</th> <th>country</th> <th>marks</th> </tr>';

    foreach ($array as $item) {
        $table .= "<tr><td>$item->id</td><td>$item->name</td><td>$item->sex</td>" .
            "<td>$item->age</td><td>$item->country</td><td>$item->marks</td></tr>";
    }

    $table .= '</table>';
    return $table;
}

}

