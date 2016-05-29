<?php

function loadresult($apicall)
{
    $json = file_get_contents($apicall);
    $json_array = json_decode($json, true);
  //  print_r($resultArray);
  //  print_r($resultArray);
  echo $apicall;
  extract($json_array);
        echo $json['Business_Name'];

}

function loadresults($apicall)
{
    $xml = simplexml_load_file($apicall)
       or die('Error: Cannot create object');
    echo '<div class="row">';
    foreach ($xml->children() as $results) {
        foreach ($results->children() as $result => $data) {
            $id = $data->id;
            $company_name = $data->company_name;
            $physical_province = $data->physical_province;
            if ($physical_province == 'British Columbia') {
                $physical_province = 'BC';
            };
            if ($physical_province != '') {
                echo '<div class="col-lg-4 col-sm-12 text-center"> <div class="circle">'.$physical_province.'</div><h3><a href="http://canadawhiz.com/'.$id.'/'.$company_name.'.html">'.$company_name.'</a></h3><p>'.$company_name.'</p></div>';
            };
        }
    }
    echo '</div>';
}

function loadrandomresults($apicall)
{
    $json = file_get_contents($apicall);
    $resultArray = json_decode($json, true);
    echo '<div class="row">';
    foreach ($resultArray as $key => $value) {
        echo '<div class="col-lg-4 col-sm-12 text-center"> <div class="circle">'.$value['State'].'</div><h3><a href="'.$value['id'].'/'.$value['Business Name'].'.html">'.$value['Business Name'].'</a></h3><p>'.$value['Category'].'</p></div>';
    }
    echo '</div>';
}

function loadsitemap($apicall)
{
    include 'Sitemap.php';
    $sitemap = new Sitemap('http://canadawhiz.com');
    $xml = simplexml_load_file($apicall)
       or die('Error: Cannot create object');
    foreach ($xml->children() as $results) {
        foreach ($results->children() as $result => $data) {
            $company_id = $data->id;
            $company_name = $data->company_name;
            $sitemap->addItem('/'.$company_id.'/'.str_replace(' ', '-', $company_name).'.html', '1.0', 'monthly', 'Today');
        }
    }
    $sitemap->createSitemapIndex('http://canadawhiz.com/', 'Today');
}
