<?php
session_start();

//flash message helper
    //example: flash('register_success', 'You are now register', 'alert alert-danger');
        //Display in view - echo flash('register_success', 'You are now register');
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if(!empty($name))
    {
        if(!empty($message) && empty($_SESSION[$name]))
        {
            if(!empty($_SESSION[$name]))
            {
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name. '_class']))
            {
                unset($_SESSION[$name. '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;

        } elseif(empty($message) && !empty($_SESSION[$name]))
        {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name  . '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
             unset($_SESSION[$name. '_class']);
        }
    }
//array(2) {
//    ["register_success"]=> string(33) "You are registered and can log in"
//    ["register_success_class"]=> string(19) "alert alert-success"
//}
}

function isLoggedIn(): bool
{
    if(isset($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
}

