<?php
namespace Anax\View;

use Anax\Controller;

$dark = new \Anax\Controller\darkSkyController();
$json = $dark->darkJsonActionGet("79.138.27.9", "2016-09-02T15:30:30", $this->di);


?>






<h1> Wheatehr api instructions</h1>



<h3>You can type the ipAdress or cordinate like "latitude, longitude" ex "56.2, 15.5167" don't forget the little space! </h3>
<form class="" action="darkJson/" method="Get">
    <?php
    echo "Weather search ";
    echo "<br>";
    echo '<input type="text" name="ip" value="">';
    echo "<br>";
    echo '<input type="text" name="date" placeholder="YYYY-MM-DDTHH:MM:SS" value="">';
    echo "<br>";
    ?>
  <input type="submit" name="submit">
</form>

To use the Api for getting the json dark wheather.
<p style="font-size:0.8rem;">http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/darkSkyController/darkJson/?ip=79.138.27.9&?date=2016-09-02T15:30:30(insert Ip)</p>

<p style="font-size:0.8rem;">http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/darkSkyController/darkJson/?ip=79.138.27.9&?date=2016-09-02T15:30:30</p>


<p style="font-size:0.8rem;"> http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/darkSkyController/darkJson/?ip=79.138.27.9&?date=2016-09-02T15:30:30" </p>

<h1> It will return a json ex. </h1>

<pre style="background-color:lightgrey; font-size:0.7rem;">
<?php echo print_r($json) ?>
</pre>
