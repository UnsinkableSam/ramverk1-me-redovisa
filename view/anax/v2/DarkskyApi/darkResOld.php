<?php
namespace Anax\View;



$dates = json_decode($dates);
$datesArray = (array) $dates;
// $data = json_decode($datesData[0]);
print_r($datesData);

$res1  = (array) $res;


// $resDecoded = parse_str($res, $output);
// // print_r($output[0]);
// $myobj = json_decode($output[0]);
// $myobj = $output;
//
//
//
//
// print_r($god);
// // print_r($myobj->daily);
// $array =  (array) $myobj;
// // print_r($myobj[0]);
// $myobj2 = json_decode($myobj[0], true);
// // print_r(array_keys($myobj2));
// $array =  (array) $myobj2;
// print_r($array["latitude"]);
// print_r($array[0]);
//
// print_r($myobj2);
// print_r($array["daily"]);
?>




<? for ($i=0; $i < count($datesData) ; $i++) { ?>


<table>
  <thead>
    <tr>
      <th> latitude</th>
      <th> longitude</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    </tr>
    <tr>
      <td> <?php echo $datesData[$i][0]->latitude ?></td>
    </tr>
    <tr>
      <td> <?php echo $datesData[$i][0]->longitude ?></td>
    </tr>
  </tbody>
</table>


<div>
    <table>
    <tbody>
      <tr>
        <td> Summary <?php  echo $datesData[$i][0]->currently->summary?></td>
      </tr>
      <tr>
        <td> Humidity <?php echo   $datesData[$i][0]->currently->humidity?></td>
      </tr>
      <tr>
        <td> Temperature <?php echo  $datesData[$i][0]->currently->temperature?></td>
      </tr>
    </tbody>
  </table>
 </div>

<?php } ?>
