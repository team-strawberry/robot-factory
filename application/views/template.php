<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>     
        <link href="/assets/css/default.css" rel="stylesheet" type="text/css" />

        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>     
        <script src="/assets/js/default.js"></script>             

    </head>
    <body>
        <div id="container">
            <nav class="navbar navbar-inverse bg-inverse">
                <div class="navbar-inner y-centered" id="nav_links" >
                    {menubar} 
                </div>
            </nav>  
            <div class="container-fluid">
                {content}
            </div>	
        </div>

        <div class="panel-footer" id="footer">
            Copyright &copy; 2017,  
            <a href="mailto:someone@somewhere.com">Team-Strawberry</a>
        </div>        

    </body>
</html>

