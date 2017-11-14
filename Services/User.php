<?php
/**
 * Created by PhpStorm.
 * User: brandon
 * Date: 13/11/17
 * Time: 05:31 PM
 */

namespace OsmosUserBundle\Services;

class User extends RequestHandler{
    public static $GET_METHOD = "GET";
    public static $POST_METHOD = "POST";
    public static $PUT_METHOD = "PUT";
    public static $URL_GETGROUPSBYCOMPANY = "http://outsource.bribiesca.mx/web/app_dev.php/paysheetGroup/{company_id}";

    public function getGroupsByCompany($company_id){
        $url = $this->parseURL(self::$URL_GETGROUPSBYCOMPANY, array("company_id" => $company_id));
        return $this->doRequest(self::$GET_METHOD, $url);
    }
}