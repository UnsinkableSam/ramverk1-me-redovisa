<?php
namespace Anax\View;

use Anax\Controller;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// print_r($di->request->getGet("ip"));


/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
$json = ["IP" => "74.125.224.72", "Type" => "Valid IPv4", "Domain" => "74.125.224.72"];
$json_string = json_encode($json, JSON_PRETTY_PRINT);
?>






<h1> Use IpApi to validate ip.</h1>

To use the Api for validating POST/GET Ip address.
<p style="font-size:0.8rem;">http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/JsonController/validateip/(insert Ip)</p>

<p style="font-size:0.8rem;">http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/JsonController/validateip/74.125.224.72</p>


<p style="font-size:0.8rem;"> http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/JsonController/validateip?ip=74.125.224.72" </p>

<h1> It will return a json ex. </h1>

<pre style=background-color:lightgrey;>
<p><?php echo $json_string; ?></p>
</pre>


<h3>Get method</h3>
<form action="<?php echo url("RestApiExternal/validateip/ ") ?>"  method="get">
  <input type="text" name="ip" value="<?= $_SERVER['REMOTE_ADDR'] ?? "::1"  ?>">
  <button type="submit" >Send</button>
</form>




<h3>Get Post</h3>
<form action="<?php echo url("RestApiExternal/validateip/ ") ?>"  method="Post">
  <input type="text" name="ip" value=" <?= $_SERVER['REMOTE_ADDR'] ?? "::1" ?>">
  <button type="submit" >Send</button>
</form>
