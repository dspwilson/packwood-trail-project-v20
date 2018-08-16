<!-- Packwood Trail Project Header Page     -->
<!-- Derek S Wilson                         -->
<!-- June 2018                              -->
<!-- Description: Header page has logo and  -->
<!-- site title, and nav                    -->
<!--                                        -->

<?php include 'includes/fp-config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$title?></title>
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="noindex,nofollow" />
<meta charset="utf-8">
    
<!-- not using fontawesome for now -->
<script src="https://use.fontawesome.com/6a71565c22.js"></script>
  
<!-- favicon commented out for now until got working -->
<!--<link rel="shortcut icon" href="http://example.com/myicon.ico">-->
    
<link rel="stylesheet" href="css/nav.css" />
<link rel="stylesheet" href="css/ptp.css" />
<link rel="stylesheet" href="css/form.css" />
</head>

<body>
<!-- START WRAPPER -->
<div class="wrapper">
<header>
      <div id="hot-logo">
        <a href="index.php"><img class="logo" alt="PTP Logo" src="images/<?=$logo?>"></a>
      </div>
      <div id="splash"><h1>Packwood Trail Project</h1></div>
  <nav>
    <ul class="topnav" id="topnavLinks">
        <?=makeNav($links) ?> <!-- php function makes navigation -->
    </ul>
    <ul class="topnav" id="topnavIcon">
        <li class="icon"> <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a> </li> <!-- &#9776 is icon -->
    </ul>
  </nav>
</header>

<!-- header to be included ends here -->