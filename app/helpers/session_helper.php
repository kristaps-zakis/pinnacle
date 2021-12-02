<?php
session_start();

function custom_data($name = '', $data = '') {
    if (!empty($name)) {
        if (!empty($data) && empty($_SESSION[$name])) {
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
        } elseif (empty($message) && !empty($_SESSION[$name])) {

        echo '<div class="'. $class .'" id="msg-flash">'. $_SESSION[$name]. '</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);
        }
    }
}

function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name . '_class'])){
                unset($_SESSION[$name]);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="'. $class .'" id="msg-flash">'. $_SESSION[$name]. '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
