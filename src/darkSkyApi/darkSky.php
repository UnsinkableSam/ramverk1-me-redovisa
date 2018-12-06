<?php
namespace Anax\darkSkyApi;

class DarkSky
{
    public static function wheatherSevenActionGet($days, $time, $array, $accessKey = "9fe0ef6d3f7319dd6198b0b4584a1011")
    {
        $timeRefined = $time;
        $refinedDates = [];
        $dates = [];
        for ($i=0; $i < $days; $i++) {
            $date = strtotime($timeRefined . "-" . $i ."day");
            array_push($dates, date("Y-m-d", $date) . "T" . date("h:m:s", $date));
        }

        return $dates;
    }


    public static function wheatherThirtyActionGet($res = null, $time = null, $accessKey = null) : array
    {
        for ($j=0; $j < count($time); $j++) {
            ${"ch$j"}  = curl_init('https://api.darksky.net/forecast/'.$accessKey.'/'.$res[0]->latitude .
                  ','. $res[0]->longitude . "," . $time[$j] . "?exclude=minutely?exclude=hourly");
        }
          $mh = curl_multi_init();
        for ($i=0; $i < count($time); $i++) {
            curl_setopt(${"ch$i"}, CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($mh, ${"ch$i"});
        }
          $responseArray = [];
        for ($k=0; $k < count($time); $k++) {
            $running = null;
            do {
                curl_multi_exec($mh, $running);
            } while ($running);
            ${"response$i"} = curl_multi_getcontent(${"ch$k"});
            $jsonDecodeResponse = json_decode(${"response$i"});

            array_push($responseArray, $jsonDecodeResponse);
        }
        curl_multi_close($mh);
        return $responseArray;
    }




    public static function wheatherActionGet($res = null, $accessKey = null) : array
    {
        for ($j=0; $j < count($res); $j++) {
            ${"ch$j"}  = curl_init('https://api.darksky.net/forecast/'.$accessKey.'/'.$res[$j]->latitude .
              ','. $res[$j]->longitude . "?exclude=minutely?exclude=hourly");
        }



        $mh = curl_multi_init();
        for ($i=0; $i < count($res); $i++) {
            curl_setopt(${"ch$i"}, CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($mh, ${"ch$i"});
        }
        $responseArray = [];
        for ($k=0; $k < count($res); $k++) {
            $running = null;
            do {
                curl_multi_exec($mh, $running);
            } while ($running);
            ${"response$i"} = curl_multi_getcontent(${"ch$k"});
        // $jsonDecodeResponse = json_decode(${"response$i"});

            array_push($responseArray, ${"response$i"});
        }

        curl_multi_close($mh);
        return $responseArray;
    }
}
