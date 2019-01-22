<?php
if(empty($_POST['num'])){
  echo "Unrecognizable input, please fill out <a href=\"fillable_form.html\">FORM</a>";
  exit();
}

$InputString = htmlspecialchars($_POST['num']);
$InputString = explode(',', $InputString);
$InputString = array_filter($InputString);

function numCheck($array){
  $a = 0;
  foreach($array as $index){
      if(!is_numeric($index)){
        unset($index[$a]);
        $a++;
        continue;
      }
      $a++;
  }
  return ($array);
}

$FilString = numCheck($InputString);
if(empty($FilString)){
  echo "Unrecognizable input, please fill out <a href=\"fillable_form.html\">FORM</a>";
  exit();
}

asort($FilString);

function arithmeticMean($array){
  $result = 0;
  foreach($array as $Index){
    $result += $Index;
  }
  $DivNum = count($array);
  $mean = $sum / $DivNum;
  return($mean);
}

$mean = $arithemticMean($FilString);

function tableSize($array){
  $maxNum = max($array);
  $sqrt = sqrt($maxNum);
  $roundNum = floor($sqrt);
  $size = $roundNum +1;
  return $size;
}

$tableSize = tableSize($FilString);

function onlyEvenNumbers($array){
  $ArrayTwo = [];
  foreach($array as $index){
    if($index % 2 !== 0){
      continue;
    }
    array_push($ArrayTwo, $index);
  }
  return $ArrayTwo;
}

$ArrayEven = onlyEvenNumbers($FilString);

function firstNumBiggerThanMean($array, $mean){
  foreach($array as $index){
    if($mean < $index){
      return $value;
    }
  }
  return false;
}

$MoreThanMean = firstNumBiggerThanMean($ArrayEvenm, $mean);
?>


<table>
  <tbody>
    <?php
    for($a = 0; $a < $tableSize; $a++)?>{
      <tr><?php
        for($b = 0; $b < $tableSize; $b++) {?>
          <td><?php
              $numInside = ($a * $tableSize) + $b + 1;
              if(in_array($numInside, $ArrayEven)) {
                if($numInside != $MoreThanMean) {
                    echo $numInside;
                } else {
                    echo "<strong>" . $numInside . "</strong>";
                }
              }?>
          </td>
      </tr><?php
    }?>
  </tbody>
</table>
