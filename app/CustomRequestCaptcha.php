<?php
/**
 * Created by PhpStorm.
 * User: freelancer
 * Date: 30/8/18
 * Time: 15:23
 */

namespace App;


class CustomRequestCaptcha
{
    public function custom()
    {
        return new \ReCaptcha\RequestMethod\Post();
    }
}