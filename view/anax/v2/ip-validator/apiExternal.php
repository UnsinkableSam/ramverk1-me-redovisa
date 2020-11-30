<?php
namespace Anax\View;

use Anax\Controller;

$latitude = $latitude ?? "";
$longitude = $longitude ?? "";

?>

<h3>Get method</h3>
<form action="<?php echo url("apiExternal/validateip/ ") ?>"  method="get">
  <input type="text" name="ip" value="<?= $_SERVER['REMOTE_ADDR'] ?? "::1"  ?>">
  <button type="submit" >Send</button>
</form>


<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox= <?php  $cord ?>  " style="border: 1px solid black"></iframe>
<br/><small><a href="https://www.openstreetmap.org/#map=1/" . <?php echo $latitude ?> . "/" . <?php echo $longitude ?> . "">Visa större karta</a></small>
