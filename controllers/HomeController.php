<?php

function homeIndex()
{
    $view = 'home';
    $title = 'T8 Book';

    $categories = listAll('the_loai');

    require_once PATH_VIEW . 'layouts/master.php';
}
