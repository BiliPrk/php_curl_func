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
     * Author: Prk
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
     * 
     * Return:
     * Content requested by cUrl
     */
    function curl_get ( $url, $cookies, $referer, $ua, $proxy ) {

        // Create a new cUrl resource
        $ch = curl_init();
        curl_setopt (
            $ch,
            CURLOPT_HTTPGET,
            1
        );
        curl_setopt (
            $ch,
            CURLOPT_CUSTOMREQUEST,
            'GET'
        );

        // Construct the request header
        $header[] = "Accept: */*";
        $header[] = "Accept-Language: en-US,en;q=0.9,zh-CN;q=0.8,zh;q=0.7";
        $header[] = "Connection: close";
        $header[] = "Cache-Control: max-age=0";
        curl_setopt (
            $ch,
            CURLOPT_HTTPHEADER,
            $header
        );

        // [Empty String] The request header will send all supported encoding types
        curl_setopt (
            $ch,
            CURLOPT_ENCODING,
            ''
        );

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
            if ( $proxy['type'] == 'HTTP' || $proxy['type'] == 'HTTPS' || $proxy['type'] == 'http' || $proxy['type'] == 'https' ) curl_setopt (
                $ch,
                CURLOPT_HTTPPROXYTUNNEL,
                1
            );
            curl_setopt (
                $ch,
                CURLOPT_PROXYAUTH,
                CURLAUTH_BASIC
                // CURLAUTH_NTLM
            );
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
                intval (
                    $proxy['port']
                )
            );
            curl_setopt (
                $ch,
                CURLOPT_PROXYUSERPWD,
                $proxy['username'] . ':' . $proxy['password']
            );
        }

        // Request and Return value
        $content = curl_exec (
            $ch
        );
        curl_close (
            $ch
        );
        return $content;
    }
    
    /**
     * [POST] curl
     * Author: Prk
     * 
     * Parameters:
     * Key          Type            Must        Remark
     * ====================================================================================================================================================================================
     * $url         String          True        URL address to be obtained
     * $datas       String          False       Value to pass in (Params Data)
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
     * 
     * Return:
     * Content requested by cUrl
     */
    function curl_post ( $url, $datas, $cookies, $referer, $ua, $proxy ) {

        // Create a new cUrl resource
        $ch = curl_init();
        curl_setopt (
            $ch,
            CURLOPT_CUSTOMREQUEST,
            'POST'
        );
        curl_setopt (
            $ch,
            CURLOPT_POST,
            1
        );
        curl_setopt (
            $ch,
            CURLOPT_POSTFIELDS,
            $datas
        );

        // Construct the request header
        $header[] = "Accept: */*";
        $header[] = "Accept-Language: en-US,en;q=0.9,zh-CN;q=0.8,zh;q=0.7";
        $header[] = "Connection: close";
        $header[] = "Cache-Control: max-age=0";
        curl_setopt (
            $ch,
            CURLOPT_HTTPHEADER,
            $header
        );

        // [Empty String] The request header will send all supported encoding types
        curl_setopt (
            $ch,
            CURLOPT_ENCODING,
            ''
        );

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

        // Proxy
        if ( $proxy ) {
            if ( $proxy['type'] == 'HTTP' || $proxy['type'] == 'HTTPS' || $proxy['type'] == 'http' || $proxy['type'] == 'https' ) curl_setopt (
                $ch,
                CURLOPT_HTTPPROXYTUNNEL,
                1
            );
            curl_setopt (
                $ch,
                CURLOPT_PROXYAUTH,
                CURLAUTH_BASIC
                // CURLAUTH_NTLM
            );
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
                intval (
                    $proxy['port']
                )
            );
            curl_setopt (
                $ch,
                CURLOPT_PROXYUSERPWD,
                $proxy['username'] . ':' . $proxy['password']
            );
        }

        // Request and Return value
        $content = curl_exec (
            $ch
        );
        curl_close (
            $ch
        );
        return $content;
    }

/*******************************************
 
Parameters that will not be written and why
Not using it now does not mean it will never be used.

 CURLOPT_DNS_CACHE_TIMEOUT
 - Set the time to save DNS information in RAM, the default is 120s.
 - The default value is sufficient, no need to specify.

 CURLOPT_CRLF
 - When enabled, convert Unix linefeeds to carriage return linefeeds.
 - I have not thought of the need for use at present, and it may be opened for use in the future.




*******************************************/
?>
