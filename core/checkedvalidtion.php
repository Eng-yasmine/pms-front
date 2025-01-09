<?php

#validtion of checkedout --------

function checkmethod($value)
{
    if ($_SERVER['REQUEST_METHOD'] == $value) {
        return true;
    }
    return false;
}

function sanitizing($value)
{
    return htmlspecialchars(htmlentities(trim($value)));
}


function check_mini_length($value, $length)
{
    if (strlen($value) < $length) {
        return false;
    }
    return true;
}

function check_max_length($value, $length)
{
    if (strlen($value) > $length) {
        return false;
    }
    return true;
}


#validtion of email

function check_email($value)
{
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}

#validtion of phone

function check_phone($value)
{
    if (is_numeric($value)) {

        return true;
    }
}

#validtion of address
function check_Address($value)
{

    if (is_string($value)) {
        return true;
    }
    return false;
}



?>

