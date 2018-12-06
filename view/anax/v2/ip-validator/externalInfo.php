<?php
namespace Anax\View;

$cord = $longitude .  "%2C"  . $latitude  ."&amp;layer=mapnik&amp;marker=" . $latitude . "%2C" . $longitude  . "";
print_r($cord);
?>


<h2>Ip: <?php echo $ip ?></h2>
<h2>Type: <?php echo $type ?></h2>
<h2>Country: <?php echo $country ?></h2>
<h2>latitude <?php echo $latitude ?> </h2>
<h2>longitude <?php echo $longitude ?> </h2>


<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox= <?php echo $cord ?>  " style="border: 1px solid black"></iframe>
<br/><small><a href="https://www.openstreetmap.org/#map=1/" . <?php echo $latitude ?> . "/" . <?php echo $longitude ?> . "">Visa större karta</a></small>
