<?php

$site_url = new \Twig\TwigFunction('site_url', function(){
    return 'https://'.$_SERVER['SERVER_NAME'].':8888';
});