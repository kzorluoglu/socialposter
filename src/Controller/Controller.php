<?php
/**
 * Created by PhpStorm.
 * User: koray
 * Date: 15.12.18
 * Time: 17:27
 */

namespace d8devs\socialposter\Controller;

use d8devs\socialposter\Base;
use d8devs\socialposter\Interfaces\ControllerInterace;

class Controller extends Base implements ControllerInterace
{

    /**
     * @param $data mixed
     */
    protected function prettyDebug($data)
    {
        echo '<pre>' . var_export($data, true) . '</pre>';
    }

    /**
     * @param $url string
     */
    protected function redirect($url)
    {
        header("Location: ".$url);
    }
}
