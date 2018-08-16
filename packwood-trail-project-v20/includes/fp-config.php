<?php 
/* ptp-config.php
/  
/  Packwood Trail Project
/
/  Derek S Wilson
/ 
/  Spring 2018
/
*/

// echo basename($_SERVER['PHP_SELF']);

define ('THIS_PAGE', basename($_SERVER['PHP_SELF']));
// echo THIS_PAGE;
// die;

switch (THIS_PAGE) {
    case 'index.php': 
        $title = "About Us";
        $logo = 'ptpLogoTransSmall.png';
        $pageID = 'About Us';
    break;
        
    case 'progress-events.php': 
        $title = 'Progress & Events';
        $logo = 'ptpLogoTransSmall.png';
        $pageID = 'Progress and Events';
    break;
        
    case 'get-involved.php': 
        $title = 'Get Involved';
        $logo = 'ptpLogoTransSmall.png';
        $pageID = 'Get Involved';
    break;
        
    case 'donate.php': 
        $title = 'Donate';
        $logo = 'ptpLogoTransSmall.png';
        $pageID = 'Donate';
    break;
                
    default:
        $title = THIS_PAGE;
        $logo = 'ptpLogoTransSmall.png';
        $pageID = '';
}

// Create associative array with navigation list items
// Associative array indices are the link href from the html 

$links['index.php']             = 'About Us';
$links['progress-events.php']   = 'Progess & Events';
$links['get-involved.php']      = 'Get Involved';
$links['donate.php']            = 'Donate';

// create nav function to highlight

function makeNav ($nav) {
    $navItem = '';
    foreach ($nav as $href => $link_title) {
        if(THIS_PAGE == $href)
        { //add class selected
           $navItem .= '<li><a href="' . $href . '" class="selected">' . $link_title . '</a></li>';
        } else { //no class selected
           $navItem .= '<li><a href="' . $href . '">' . $link_title . '</a></li>'; 
        } //end else
    } //end foreach
    return $navItem;
} // end makeNav

?>
