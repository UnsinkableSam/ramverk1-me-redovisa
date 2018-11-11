<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
$json = ["IP" => "172.217.14.227", "Type" => "Valid IPv4", "Domain" => "sea30s02-in-f3.1e100.net"];
$json_string = json_encode($json, JSON_PRETTY_PRINT);
?>



<h1> Use IpApi to validate ip.</h1>

To use the Api for validating POST Ip address.
<p>http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/IpJsonController/validateip/(insert Ip)</p>



<h1> It will return a json ex. </h1>
<!-- <link>http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/IpJsonController/validateip/74.125.224.72</link> -->
<link><?php echo url("IpJsonController/validateip/74.125.224.72") ?> </link>


<form action="<?php echo url("IpJsonController/validateip/ ") ?>"  method="post">
  <input type="submit" name="74.125.224.72" value="">
</form>

<p><?php echo $json_string; ?></p>
