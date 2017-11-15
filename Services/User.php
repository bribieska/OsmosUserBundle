<?php
/**
 * Created by PhpStorm.
 * User: brandon
 * Date: 13/11/17
 * Time: 05:31 PM
 */

namespace OsmosUserBundle\Services;

use Symfony\Component\DependencyInjection\Container;

class User extends RequestHandler{
    public static $GET_METHOD = "GET";
    public static $POST_METHOD = "POST";
    public static $PUT_METHOD = "PUT";
    public static $OUTSOURCE_PREFIX = "";
    public static $API_PREFIX = "";
    public static $PAYSHEET_PREFIX = "";

    public static $URL_GETGROUPSBYCOMPANY = "/paysheetGroup/{company_id}";

    public function __construct($api, $outsource, $paysheet){
        self::$API_PREFIX = $api;
        self::$OUTSOURCE_PREFIX = $outsource;
        self::$PAYSHEET_PREFIX = $paysheet;
    }

    public function getGroupsByCompany($company_id){
        $url = $this->parseURL(self::$OUTSOURCE_PREFIX . self::$URL_GETGROUPSBYCOMPANY, array("company_id" => $company_id));
        return $this->doRequest(self::$GET_METHOD, $url);
    }
}