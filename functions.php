<?php

function display_if_exists($var, $name)
{
    if (strlen($var) == 0) {
    } else {
        echo '<div class="col-6 col-lg-6"><blockquote><p><span itemprop="name" content="'.$var.'">'.$var.'</span></p><small>'.$name.'</small></blockquote></div>';
    }
}

function display_if_exists_simple($var)
{
    if (strlen($var) == 0) {
    } else {
        echo $var;
    }
}

function loadresult($apicall)
{
    $json = file_get_contents($apicall);
    $json_array = json_decode($json, true);
    foreach ($json_array[0] as $key => $value) {
        global $$key;
        $$key = $value;
    }
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
        $cname = '';
        $id = '';
        $category = '';
        $state = '';
        if (array_key_exists('Business Name', $value)) {
            $cname = $value['Business Name'];
        }
        if (array_key_exists('Category', $value)) {
            $category = $value['Category'];
        }
        if (array_key_exists('Company Name', $value)) {
            $cname = $value['Company Name'];
        }
        if (array_key_exists('SIC Code Description', $value)) {
            $category = $value['SIC Code Description'];
        }
        $state = $value['State'];
        $id = $value['id'];
        echo '<div class="col-lg-4 col-sm-12 text-center"> <div class="circle">'.$state.'</div><h3><a href="/?id='.$id.'&business='.$cname.'">'.$cname.'</a></h3><p>'.$category.'</p></div>';
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
