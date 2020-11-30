<?php
namespace Anax\View;

$res1  = (array) $res[0];
$resObj = json_decode($res1[0]);
if (isset($resObj->latitude)) {
    $streetinfo = json_decode($streetname);
    $streetinfoArray  = (array) $streetinfo;

    $resThirty1  = (array) $resThirty;
    $data = $resObj->daily->data;


    $dataThirty = $resThirty1;


    $cord = $resObj->longitude  .  "%2C"  . $resObj->latitude  ."&amp;layer=mapnik&amp;marker=" . $resObj->latitude . "%2C" . $resObj->longitude   . "";

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
<br>
<br>
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox= <?php echo  $cord ?>  " style="border: 1px solid black"></iframe>
    <br/><small><a href="https://www.openstreetmap.org/#map=1/" . <?php echo $resObj->latitude  ?> . "/" . <?php echo $resObj->longitude  ?> . "">Visa större karta</a></small>


  <table>
    <thead>
      <tr>
        <th> latitude</th>
        <th> longitude</th>
        <th> County </th>
        <th> state </th>

      </tr>
    </thead>
    <tbody>
      <tr>

      </tr>
      <tr>
        <td> <?php echo $resObj->latitude ?> </td>
        <td> <?php echo $resObj->longitude ?> </td>
          <td> <?php echo $streetinfoArray["address"]->county ?> </td>
          <td> <?php echo $streetinfoArray["address"]->state ?> </td>

      </tr>
    </tbody>
  </table>

  <br>
  <br>
  <h3>Past week</h3>
  <br>
  <br>
    <?php for ($i=0; $i < count($data); $i++) { ?>
      <div style="border-style: solid; float:left; font-size: 0.8rem; width: 10rem; height:12rem;">
          <table>
          <tbody>
            <tr>
              <td> Time  <?php echo date("Y-m-d", $data[$i]->time) ?> </td>
            </tr>
            <tr>
              <td> Summary  <?php echo $data[$i]->summary ?> </td>
            </tr>
            <tr>
              <td> Humidity <?php echo   $data[$i]->humidity?></td>
            </tr>
            <tr>
              <td> Temperature <?php echo  $data[$i]->apparentTemperatureMax ?></td>
            </tr>
          </tbody>
        </table>
       </div>
    <?php }; ?>


  <br>
  <br>
  <h3>Past thirty days</h3>
  <br>
  <br>
    <?php for ($i=0; $i < count($dataThirty); $i++) { ?>
      <div style="border-style: solid; float:left; font-size: 0.8rem; width: 10rem; height:12rem; background-color:grey;">
          <table>
          <tbody>
            <tr>
              <td> Time  <?php echo date("Y-m-d", $dataThirty[$i]->currently->time) ?> </td>
            </tr>
            <tr>
              <td> Summary  <?php echo $dataThirty[$i]->currently->summary ?> </td>
            </tr>
            <tr>
              <td> Humidity <?php echo   $dataThirty[$i]->currently->humidity?></td>
            </tr>
            <tr>
              <td> Temperature <?php echo  $dataThirty[$i]->currently->temperature ?></td>
            </tr>
          </tbody>
        </table>
       </div>
    <?php }; ?>
<?php } else {
    print_r($res[0]);
};?>
