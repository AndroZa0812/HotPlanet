<?php

class Movie
{
    private $name;
    private $year;
    private $desc;
    private $ageR;
    private $actors;

    public function __construct($name, $desc, $year = 2016,$ageR=0, $actors = array(),$img="img/favicon.png")
    {
        $this->name = $name;
        $this->year = $year;
        $this->desc = $desc;
        $this->ageR=$ageR;
        $this->actors = $actors;
        $this->img=$img;
    }

    public function addActor($actorName)
    {
        array_push($this->actors, $actorName);
    }

    public function removeActor($actorName)
    {
        unset($this->actors[array_search($actorName, $this->actors)]);
        sort($this->actors);
    }

    public function editActor($actorName, $newName)
    {
        for($i = 0; $i < count($this->actors); $i++)
        {
            if($actorName == $this->actors[$i]) {
                $this->actors[$i] = $newName;
                break;
            }
        }
    }


    public function setActors($actors)
    {
        $this->actors = $actors;
    }

    public function getActors()
    {
        return $this->actors;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getAgeR()
    {
        return $this->ageR;
    }

    public function setAgeR($ageR)
    {
        $this->ageR = $ageR;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getImg()
    {
        return $this->img;
    }
    public function printMovie() {
        echo "שם הסרט: $this->name, שנה: $this->year <br/>";
        echo "תיאור: $this->desc <br/>";
        if($this->ageR!=0) {
            echo "הגבלת גיל: $this->ageR<br/>";
        }
        else
            echo "אין הגבלת גיל <br/>";

        echo " רשימת שחקנים: ";
        $check = count($this->getActors());
        if($check) {
            echo "<ul>";
            foreach ($this->actors as $actorName) {
                echo "<li>$actorName</li>";
            }
            echo "</ul>";
        }
        else{
            echo 'אין שחקנים';
        }
    }
}