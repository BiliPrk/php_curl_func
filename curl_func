<?php
/**
 * Name: Complete PHP-cUrl function
 * Version: 1.0.1
 * Time: 2022-06-16 01:55 AM (GMT+8)
 * Author: Prk
 * Website: https://imprk.me
 * Location: Shanghai City of People's Republic of China
 * 
 * !! TIPS !!
 * This project will be open source licensed on GitHub in perpetuity.
 * And I will continue to update this project according to the actual situation.
 * As for when will the project stop being updated? Haha, I think U might be overthinking!
 * PHP is constantly being updated, and so is network security.
 * This project will not stop updating due to temporary needs!
 * Feel free to leave ur questions and ideas in the "Issues" of this project!
 * U can also follow me on Twitter to get the latest updates and interact with me.
 * 
 * Project link: https://github.com/BiliPrk/php_curl_func
 * My Twitter: https://twitter.com/bili_prk
 */


    /**
     * [GET] curl
     * 
     * Parameters:
     * Key          Type            Must        Remark
     * ====================================================================================================================================================================================
     * $url         String          True        URL address to be obtained
     * $cookies     String          False       "cookie" part of the HTTP request header
     * $referer     String          False       "referer" part of the HTTP request header (When the site "Location" redirects, automatically set the "Referer" information in the "header")
     * $ua          String          False       "User-Agent" part of the HTTP request header (If not provided cUrl will use Microsoft Edge Chromium's UA)
     * $proxy       Array           False       Proxy server information (if no value is given, no proxy server will be used)
     * 
     * Proxy array:
     * Key          Type            Must        Remark
     * ====================================================================================================================================================================================
     * type         String          True
     * server       String          True
     * port         String          True
     */
    function curl_get ( $url, $cookies, $referer, $ua, $proxy ) {

        // Create a new cUrl resource
        $ch = curl_init();

        // URL address to be obtained
        curl_setopt (
            $ch,
            CURLOPT_URL,
            $url
        );

        // "cookie" part of the HTTP request header
        if ( $cookies ) curl_setopt (
            $ch,
            CURLOPT_COOKIE,
            $cookies
        );

        // referer
        if ( $referer ) {
            curl_setopt (
                $ch,
                CURLOPT_AUTOREFERER,
                $referer
            );
            curl_setopt (
                $ch,
                CURLOPT_REFERER,
                $referer
            );
        }

        // UA
        curl_setopt (
            $ch,
            CURLOPT_USERAGENT,
            $ua ? $ua : 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.39'
        );

        // Set the maximum number of seconds that cUrl is allowed to execute to 15s
        curl_setopt (
            $ch,
            CURLOPT_TIMEOUT,
            15
        );

        // Proxy
        if ( $proxy ) {
            curl_setopt (
                $ch,
                CURLOPT_PROXYTYPE,
                $proxy['type']
            );
            curl_setopt (
                $ch,
                CURLOPT_PROXY,
                $proxy['server']
            );
            curl_setopt (
                $ch,
                CURLOPT_PROXYPORT,
                $proxy['port']
            );
        }
    }

    /**
     * [POST] curl
     */
    function curl_post() {
        //
    }
