<?php

namespace Anax\View;


/**
 * Template file to render a view.
 */


 $ip = getenv('HTTP_CLIENT_IP')?:
 getenv('HTTP_X_FORWARDED_FOR')?:
 getenv('HTTP_X_FORWARDED')?:
 getenv('HTTP_FORWARDED_FOR')?:
 getenv('HTTP_FORWARDED')?:
 getenv('REMOTE_ADDR');


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
  <input type="text" name="ip" value="<?php $ip ?>">
  <input type="submit">
</form>

<h1>IP information</h1>
<?php $validIp = json_decode($validIp, true); ?>

<h3><?php echo "IP: " .  $validIp["IP"] ?></h3>
<h3><?php echo "IP-Type: " .  $validIp["Type"] ?></h3>
<h3><?php echo "Domain: " .  $validIp["Domain"] ?></h3>
