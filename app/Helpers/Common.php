<?php
/**
 * Created by PhpStorm.
 * User: Abdullah
 * Date: 11/05/2018
 * Time: 7:46 PM
 */

/**
 * Current controller name
 * @return string
 */
function currentController(){
    return class_basename(Route::current()->controller);
}
