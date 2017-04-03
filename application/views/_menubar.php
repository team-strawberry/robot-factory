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
    <ul class="dropdown nav navbar-header navbar-brand">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="/roles/actor/guest">Guest</a></li>
            <li><a href="/roles/actor/worker">Worker</a></li>
            <li><a href="/roles/actor/supervisor">Supervisor</a></li>
            <li><a href="/roles/actor/boss">Boss</a></li>
        </ul>    
    </ul>
</div>