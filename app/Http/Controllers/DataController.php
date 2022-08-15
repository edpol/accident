<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getMap($country = "india")
    {
        // if you don't have it in the datamaps folder download it
        $filename =  public_path() . '/datamaps/' . $country . '.topo.json';

        $result = "";
        // if file exists is 7 days old, delete it
        if (file_exists($filename)) {
            $cutoff_days = 120;
            $file_date = filectime($filename);
            $time_now = strtotime(date("Y-m-d H:i:s"));
            $diff = ($time_now - $file_date);
            $cutoff_time = 60 * 60 * 24 * $cutoff_days;
            if ($diff > $cutoff_time) {
                unlink($filename);
                $result .= "The file $filename exists, but is more than $cutoff_days old and was deleted <br>";
                $result .= "file_date: $file_date<br>";
                $result .= "cutoff: $cutoff_time<br>";
                $result .= "diff: $diff <br>";
            }
        }
        if (file_exists($filename)) {
            $result .= "The file $filename exists<br>";
        } else {
            $result .= "The file $filename does not exist";

            $url = "https://rawgit.com/Anujarya300/bubble_maps/master/data/geography-data/{$country}.topo.json";

            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n"
                )
            );

            $context = stream_context_create($opts);

            /** @var TYPE_NAME $data */
            $data = file_get_contents($url, false, $context);

            $myFile = fopen($filename, "w") or die("Unable to open file!");
            fwrite($myFile, $data);
            fclose($myFile);

        }
        return view('results', compact('result') );
    }

    // build list of countries, name, iso2, iso3
    // all the countries
    // https://covid19.mathdro.id/api/countries

    // pull usa data
    // https://covid19.mathdro.id/api/countries/usa
    // if death.value is not 0  confirmed.value, recovered.value
    // https://covid19.mathdro.id/api/countries/ago/deaths
    // these 3 sites have to coordinates
    public function getCountryList()
    {
        $url  = "https://covid19.mathdro.id/api/countries";
        $country_list = file_get_contents($url);
        return view('countries', compact('country_list'));
    }


    // usa.html and india.html examples
    // https://raw.githubusercontent.com/Anujarya300/bubble_maps/master/usa.html
    // https://raw.githubusercontent.com/Anujarya300/bubble_maps/master/india.html

    // covid rates
    // https://data.covid19india.org/state_district_wise.json

    public function getData($country="india")
    {
        $url = "https://covid19.mathdro.id/api/countries/" . $country;
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n"
            )
        );

        $context = stream_context_create($opts);

        /** @var TYPE_NAME $data */
        $result = file_get_contents($url, false, $context);
        return view('results', compact('result') );
    }
}
