<?php
/*
 * Menu navbar, just an unordered list
 */
?>

<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand">
            <img id="main_logo" src="assets/images/umbrellacorporation3.png" onerror="this.style.display='none'" alt=""/>
        </a>
    </div>
    {menudata}
    <ul class="nav navbar-nav">
        <li>
            <a href="{link}">            
                <b>{name}</b>
            </a>
        </li>
    </ul>
    {/menudata}
</div>