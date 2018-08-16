<!-- Packwood Trail Project Footer Page     -->
<!-- Derek S Wilson                         -->
<!-- June 2018                              -->
<!-- Description: Footer page has copyright -->
<!-- and html and css validation links      -->
<!--                                        -->

<!-- Footer to be included starts here -->
<!-- START Footer -->
<footer>
  <p><small>&copy; <?=date("Y"); ?> by <a href="index.php" target="_blank">Packwood Trail Project</a>, All Rights Reserved ~ <a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a> ~ <a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a></small></p>
</footer>
<!-- END Footer --> 

<!-- JavaScript based on W3Schools.com Top Navigation Response Exercise --> 
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("topnavLinks");
    var y = document.getElementById("topnavIcon");
    
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
    
    if (y.className === "topnav") {
        y.className += " responsive";
    } else {
        y.className = "topnav";
    } 
}
</script>
</div> <!-- END WRAPPER DIV -->

<!-- Footer to be included ends here -->