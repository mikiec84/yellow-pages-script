<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=iso-8859-1');
include 'settings.php';
include 'functions.php';
if (isset($_GET['id'])) {
    $vid = $_GET['id'];
    loadresult('http://'.$domain.'/api/?type=Get+US+Email+result&id='.$vid);
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Cache-control" content="public">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (isset($vid)) {
    ?>
<?php if (strlen($Business_Name) == 0) {
} else {
    echo '<title>'.$Business_Name.' - '.(substr($Phone_Number, 0, -3).'xxx').' Information provided by Canadawhiz.com</title>';
}
    ?>
<?php

}; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="http://<?php echo $domain;?>"><?php echo $domain;?></a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!--      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a> </li>
        <li><a href="#">Link</a> </li>
      </ul>
      -->
      <form action="http://<?php echo $domain;?>/" method="get" class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input name="search" type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</nav>
<?php if (isset($vid)) {
    ?>
<header>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-center"><?php echo $Business_Name;
    ?></h1>
          <p class="text-center">
            <?php if (strlen($Category) == 0) {
} else {
    echo $Category;
}
    ?>
            <?php if (strlen($Category_2) == 0) {
} else {
    echo ' | '.$Category_2;
}
    ?>
            <?php if (strlen($Category_3) == 0) {
} else {
    echo ' | '.$Category_3;
}
    ?>
          </p>
          <p>&nbsp;</p>
          <p class="text-center">
            <?php if (strlen($Phone_Number) == 0) {
} else {
    echo '<a class="btn btn-primary btn-lg" href="tel:'.$Phone_Number.'" role="button">'.$Phone_Number.'</a>';
}
    ?>
            <?php if (strlen($Email) == 0) {
} else {
    echo '<a class="btn btn-primary btn-lg" href="mailto:'.$Email.'" role="button">'.$Email.'</a>';
}
    ?>
            <?php if (strlen($Website) == 0) {
} else {
    echo '<a class="btn btn-primary btn-lg" href="'.$Website.'" role="button">'.$Website.'</a>';
}
    ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</header>
<section>
  <div class="container ">
    <div class="row">
      <div class="col-lg-12 page-header text-center">
        <h2>Everything we have on <?php echo $Business_Name;
    ?></h2>
      </div>
    </div>
    <div class="row">
      <organization itemscope itemtype="http://schema.org/Organization">
        <?php if (strlen($Business_Name) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p><span itemprop="name" content="'.$Business_Name.'">'.$Business_Name.'</span></p><small>company name</small></blockquote></div>';
}
    ?>
        <?php if (strlen($Phone_Number) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p><span itemprop="telephone" content="'.$Phone_Number.'">'.$Phone_Number.'</span></p><small>telephone number</small></blockquote></div>';
}
    ?>
        <?php if (strlen(fax_number) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p><span itemprop="faxNumber" content="'.fax_number.'">'.fax_number.'</span></p><small>fax number</small></blockquote></div>';
}
    ?>
        <?php if (strlen($Email) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p><span itemprop="email" content="'.$Email.'"><a href="mailto:'.$Email.'" >'.$Email.'</a></span></p><small>email</small></blockquote></div>';
}
    ?>
        <?php if (strlen($Website) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p><a href="'.$Website.'" itemprop="url" rel="nofollow target="_new" content="'.$Website.'">'.$Website.'</a></p><small>website</small></blockquote></div>';
}
    ?>
      </organization>
      <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <?php if (strlen($Address) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p><span itemprop="streetAddress" content="'.$Address.'">'.$Address.'</span>, <span itemprop="addressRegion" content="'.$Address.'">'.mailing_province.'</span>, <span itemprop="postalCode" content="'.mailing_postal.'">'.mailing_postal.'</span>, <span itemprop="addressCountry" content="Canada">Canada</span></p><small>mailing address</small></blockquote></div>';
}
    ?>
      </address>
      <?php if (strlen(average_earning) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.average_earning.'</p><small>average earning</small></blockquote></div>';
}
    ?>
      <?php if (strlen(primary_contact_name) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.primary_contact_name.'</p><small>primary contact name</small></blockquote></div>';
}
    ?>
      <?php if (strlen(primary_contact_phone) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.primary_contact_phone.'</p><small>primary contact phone</small></blockquote></div>';
}
    ?>
      <?php if (strlen(primary_contact_email) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.primary_contact_email.'</p><small>primary contact email</small></blockquote></div>';
}
    ?>
      <?php if (strlen(other_contacts) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.other_contacts.'</p><small>other contacts</small></blockquote></div>';
}
    ?>
      <?php if (strlen(year_founded) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.year_founded.'</p><small>year founded</small></blockquote></div>';
}
    ?>
      <?php if (strlen(industry) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.industry.'</p><small>industry</small></blockquote></div>';
}
    ?>
      <?php if (strlen(naics_primary) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.naics_primary.'</p><small>naics primary</small></blockquote></div>';
}
    ?>
      <?php if (strlen(naics_secondary) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.naics_secondary.'</p><small>naics secondary</small></blockquote></div>';
}
    ?>
      <?php if (strlen(sic_primary) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.sic_primary.'</p><small>sic primary</small></blockquote></div>';
}
    ?>
      <?php if (strlen(sic_secondary) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.sic_secondary.'</p><small>sic secondary</small></blockquote></div>';
}
    ?>
      <?php if (strlen(sales_volume) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.sales_volume.'</p><small>sales volume</small></blockquote></div>';
}
    ?>
      <?php if (strlen(number_of_employees) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.number_of_employees.'</p><small>number of employees</small></blockquote></div>';
}
    ?>
      <?php if (strlen(products_services) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.products_services.'</p><small>products services</small></blockquote></div>';
}
    ?>
      <?php if (strlen(business_activity) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.business_activity.'</p><small>business activity</small></blockquote></div>';
}
    ?>
      <?php if (strlen(profile) == 0) {
} else {
    echo '<div class="col-6 col-lg-6"><blockquote><p>'.profile.'</p><small>profile</small></blockquote></div>';
}
    ?>
    </div>
  </div>
  <!-- If the company id is set -->
  <?php

}; ?>
  <?php if (isset($search)) {
    ?>
  <!-- If search is used -->
  <div class="container ">
    <div class="row">
      <div class="col-lg-12 page-header text-center">
        <h2>Search Results</h2>
      </div>
    </div>
    <?php loadresults("http://canadawhiz.com/api/?type=search&value=$search");
    ?>
  </div>

  <!-- If search is used -->
  <?php

}; ?>
  <div class="container ">
    <div class="row">
      <div class="col-lg-12 page-header text-center">
        <h2>Companies of the Day</h2>
      </div>
    </div>
    <?php
    loadrandomresults('http://'.$domain.'/api/?type=Get+US+Email+results');?>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 page-header text-center">
        <h2>Our Services</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-lg-4">
        <h3>Add your Business</h3>
        <p> <em class="icon-desktop "></em>If you wish to be part of our directory or want to add your business or contact us for any other enquiry - like featured ads use the link bellow</p>
        <p><a class="btn btn-default" href="mailto:<?php echo $email;?>?subject=add entry on <?php echo $domain;?>&body=Hi,please add my company on your database : Here are the details :">Add Business </a></p>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Claim / Edit your Business</h3>
        <p> <i class="icon-desktop "></i> Do you something not correct in your entry? We charge an administration fee of 10$ per change (currently free). Click the link bellow to pay the fee via Paypal and your change will be implemented in the next 5 business days.</p>
      <?php echo isset($vid) ? '<p><a class="btn btn-default" href="mailto:<?php echo $email;?>?subject=edit entry from <?php echo $domain;?>&body=Hi,please edit my company on your database : '.$_SERVER['REQUEST_URI'].' Here are the changes I need :">Edit Entry </a></p>' : ' '; ?>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Request Removal</h3>
        <p> <i class="icon-desktop "></i> Our Database comes from the official governemental Canadian website. If you do not wish to be listed on this directory any more, click bello and provide some justification / proof of ownership</p>

     <?php echo isset($vid) ? '<p><a class="btn btn-default" href="mailto:<?php echo $email;?>?subject=remove entry from canadawhiz.com&body=Hi,please remove my company from your database : '.$_SERVER['REQUEST_URI'].'">Remove Entry </a></p>' : ' '; ?>
      </div>
    </div>
  </div>
</section>
<div class="well"> </div>


<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>&copy; <?php echo $title;?> | Operated by <a href="<?php echo $operatedby;?>" rel="nofollow"><?php echo $operatedbysort;?></a> <?php echo isset($vid) ? '<a HREF="mailto:<?php echo $email;?>?subject=remove entry from <?php echo $domain;?>&body=Hi,please remove my company from your database : '.$_SERVER['REQUEST_URI'].'">Remove Entry</a>' : ' '; ?></p>
      </div>
    </div>
  </div>
</footer>
<!-- / FOOTER -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




</body>
</html>
