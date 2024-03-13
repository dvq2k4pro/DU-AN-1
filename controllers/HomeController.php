<?php

function homeIndex()
{
    $dataUser = getAllUser();

    require_once PATH_VIEW . 'home.php';
}
