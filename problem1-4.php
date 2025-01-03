<?php
echo 'Problem 1 (validateEmail): <br><hr>';
function validateEmail($text){
    if (filter_var($text, FILTER_VALIDATE_EMAIL)){
        return 'true';
    }else{
        return 'false';
    }
}
$testCases= ["haitham@helmy.com","haitham@helmy@hemy.com","123","haitham@helmy@hemy.c","haitham@.com"];
foreach ($testCases as $item){
    echo $item . ' => '. validateEmail($item).'<br>';
}


echo '<hr> Problem 4 (isValidBracketsSequence): <br><hr>';
function isValidBracketsSequence($text){
    $textArray = str_split($text , 1);
    $brackets = ["{","[","(",")","]","}"];
    $length = count($textArray);
    if (($length % 2 ) !== 0){
        return 'false';
    }else{
        for($i=0;$i<3;$i++){
            $openingBracket = $brackets[$i];
            $closingBracket = $brackets[$i+3];
            if(in_array($openingBracket,$textArray) && in_array($closingBracket,$textArray)){
                $openingBracketIndex = array_search($openingBracket,$textArray);
                $closingBracketIndex = array_search($closingBracket,$textArray);
                if($closingBracketIndex < $openingBracketIndex){
                    return 'false';
                }else{
                    return 'true';
                }
            }else{
                return 'false';
            }
        }
    }
}
$testCases= ["{([])}","{}[]()","{(}",")(","{()}","{[}]"];
foreach ($testCases as $item){
    echo $item . ' => '. isValidBracketsSequence($item).'<br>';
}

echo '<hr> Problem 3 (LinkedClass): <br><hr>';
class LinkedClass
{
    public $str;
    public $newNode;
    public function __construct($str, $newNode)
    {
        $this->str = $str;
        $this->newNode = $newNode;
    }

    function linkedList() : array
    {
        return explode(" ", $this->str);
    }

    function addNode() : int
    {
        return array_search($this->newNode, $this->linkedList());
    }

    function removeNode() : array
    {
        $array = $this->linkedList();
        $index = array_search($this->newNode, $array);
        $newArray = [$this->newNode];
        unset($array[$index]);
        foreach ($array as $item){
            if ($item < $this->newNode){
                $newArray[] = $item;
            }
        }
        return $newArray;
    }

}
var_dump((new LinkedClass("10 5 12 7 3 9 10", "7"))->removeNode());
