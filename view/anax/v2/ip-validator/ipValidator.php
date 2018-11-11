<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
$ipC = new \Anax\Controller\IpController();
$ip = $di->request->getGet("ip");
$validIp = null;

if ($ip) {
    $validIp = $ipC->validateipActionGet($ip);
}


?>

<h1>Ip validator</h1>
<form class=""   method="get">
  <input type="text" name="ip" value="">
  <input type="submit">
</form>

<h1>IP information</h1>
<?php $validIp = json_decode($validIp, true); ?>

<h3><?php echo "IP: " .  $validIp["IP"] ?></h3>
<h3><?php echo "IP-Type: " .  $validIp["Type"] ?></h3>
<h3><?php echo "Domain: " .  $validIp["Domain"] ?></h3>
