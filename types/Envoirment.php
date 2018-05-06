<?php
/**
 * Created by PhpStorm.
 * User: dunca
 * Date: 06-May-18
 * Time: 19:16
 */

namespace WeebPHP\types;


abstract class Environment {

    public static function getProduction() {
        return "https://api.weeb.sh";
    }

    public static function getStaging() {
        return "https://staging.weeb.sh";
    }

    /**
     * @param String $url The url for the api
     * @return String the thing that you entered
     */
    public static function getCustomUrl(String $url) {
        return $url;
    }

    /*const PRODUCTION = "https://api.weeb.sh";
    const STAGING = "https://staging.weeb.sh";*/

}