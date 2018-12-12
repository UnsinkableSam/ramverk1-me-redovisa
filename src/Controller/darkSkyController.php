<?php
namespace Anax\Controller;

  use \Anax\darkSkyApi;

  use Anax\Commons\ContainerInjectableInterface;

  use Anax\Commons\ContainerInjectableTrait;

class DarkSkyController implements ContainerInjectableInterface
{
      use ContainerInjectableTrait;

    public function indexAction() : object
    {
          $title = " | Ip Json API";
          $page = $this->di->get("page");
          $page->add(
              "anax/v2/DarkskyApi/darkSkyApi",
              [
                  "header" => "hello",
                  "text" => "text",
              ]
          );
          return $page->render([
              "title" => "$title"
          ]);
    }



    public function indexJsonAction() : object
    {
          $title = " | Ip Json API";
          $page = $this->di->get("page");
          $page->add(
              "anax/v2/DarkskyApi/darkSkyApiJson",
              [
                  "header" => "hello",
                  "text" => "text",
              ]
          );
          return $page->render([
              "title" => "$title"
          ]);
    }










    public function darkActionPost($ipAdress = null) : object
    {
        $keykey = $this->di->get("apikey");
        $darkSkyKey = $this->di->get("apikeyDarkSky");
        $time = $this->di->get("request")->getPost("date") ?? "";
        $ipInfo["IP"] = $this->di->get("request")->getPost("ip") ?? $ipAdress;
        $array = [];
        $apiEx =  $this->di->get("ExternalApi");
        $res = $apiEx->validateipActionGet($ipInfo["IP"], $keykey);

        $obj = json_decode($res);

        if ($obj == null) {
            $objSplit = explode(",", $ipInfo["IP"]);
            $obj = new \stdClass();
            $obj->latitude = $objSplit[0];
            $obj->longitude = $objSplit[1];
        }

        $coordinates = (object) ["latitude" => $obj->latitude];
        $coordinates->longitude = $obj->longitude;

        $darkClass = new \Anax\darkSkyApi\DarkSky();
        array_push($array, $coordinates);
        $res = $darkClass::wheatherActionGet($array, $darkSkyKey);

        $dates = $darkClass::wheatherSevenActionGet(30, $time);
        $resThirtyDaysRequest = $darkClass::wheatherThirtyActionGet($array, $dates, $darkSkyKey);

          // try {
          //   if (array_key_exists("code",$res)) {
          //     throw new \Exception("Value must be 1 or below");
          //   }
          //
          // } catch (\Exception $e) {
          //   return $res[0];
          // }

        $streetname = $darkClass->streetActionGet($coordinates->longitude, $coordinates->latitude);
        //
        // $refinedDates = [];
        //
        //   array_push($refinedDates, $dark::wheatherActionGet($array, $dates));

        // $datesJson = json_encode($dates);
        // print_r(strtotime("2010-05-17 + 1 day"));
          $title = " | Ip Json API";
          $page = $this->di->get("page");
          $page->add(
              "anax/v2/DarkskyApi/darkRes",
              [
                  "header" => "hello",
                  "res" => $res,
                  "ogDate" => $time,
                  "resThirty" => $resThirtyDaysRequest,
                  "streetname" => $streetname
              ]
          );
          return $page->render([
              "title" => "$title"
          ]);
    }



    public function darkJsonActionGet($ipAdress = null, $datepara = null, $di = null) : string
    {
        $this->di = $this->di ?? $di;

        $resArray = [];

        $keykey = $this->di->get("apikey");
        $time = $this->di->get("request")->getGet("date") ?? $datepara;
        $ipInfo["IP"] = $this->di->get("request")->getGet("ip") ?? $ipAdress;
        $darkSkyKey = $this->di->get("apikeyDarkSky");

        $array = [];
        $apiEx =  $this->di->get("ExternalApi");
        $res = $apiEx->validateipActionGet($ipInfo["IP"], $keykey);


        $obj = json_decode($res);
        if ($obj == null) {
            $objSplit = explode(",", $ipInfo["IP"]);
            $obj = new \stdClass();
            $obj->latitude = $objSplit[0];
            $obj->longitude = $objSplit[1];
        }

        $coordinates = (object) ["latitude" => $obj->latitude];
        $coordinates->longitude = $obj->longitude;


        $darkClass = new \Anax\darkSkyApi\DarkSky();
        array_push($array, $coordinates);
        $res = $darkClass::wheatherActionGet($array, $darkSkyKey);






        $dates = $darkClass::wheatherSevenActionGet(30, $time);
        $resThirtyDaysRequest = $darkClass::wheatherThirtyActionGet($array, $dates, $darkSkyKey);
          // try {
          //   if (array_key_exists("code",$res)) {
          //     throw new \Exception("must be ip or coordinates");
          //   }
          //
          // } catch (\Exception $e) {
          //   return $res;
          // }
        array_push($resArray, json_decode($res[0], JSON_PRETTY_PRINT));
        array_push($resArray, $resThirtyDaysRequest);

        $response = json_encode($resArray, JSON_PRETTY_PRINT);
        return $response;
    }
}
