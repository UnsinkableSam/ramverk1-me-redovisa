<?php
namespace Anax\View ;

use Anax\Controller;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
// public function testIndex() {

// print_r($di->request->getGet("ip"));

?>

<h3>Get method</h3>
<form action="<?php echo url("InternalController/validateip/ ") ?>"  method="get">
  <input type="text" name="ip" value="">
  <button type="submit" >Send</button>
</form>

<!-- How to fix header problem where we redirect! !!  -->
