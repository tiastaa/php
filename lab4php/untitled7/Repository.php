<?php
class Repository
{
        public function saveCompetitors($array)
    {
        $file = fopen("competitors.txt", "w");
        fwrite($file, serialize($array));
        fclose($file);
    }

    public function loadCompetitors()
    {
        $this->competitors = unserialize(file_get_contents("competitors.txt"));
    }
}