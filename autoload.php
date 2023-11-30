<?php
spl_autoload_register(function ($class_name) {
    include "config/" . $class_name . '.php';
});
