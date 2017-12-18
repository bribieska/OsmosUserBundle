<?php
/**
 * Created by PhpStorm.
 * User: brandon
 * Date: 13/11/17
 * Time: 05:31 PM
 */

namespace OsmosUserBundle\Services;

use Symfony\Component\DependencyInjection\Container;

class User extends RequestHandler
{

    public static $OUTSOURCE_PREFIX = "";
    public static $PAYSHEET_PREFIX  = "";
    public static $API_PREFIX       = "";
    public static $API_USERS        = "";

    public static $DELETE_METHOD    = "DELETE";
    public static $POST_METHOD      = "POST";
    public static $PUT_METHOD       = "PUT";
    public static $GET_METHOD       = "GET";

    public static $URL_GETGROUPSBYCOMPANY = "/paysheetGroup/{company_id}";

    public static $URL_NEWDOCUMENTTYPE = "/documents/new_file_type/{users}";

    /**
     * User constructor.
     * @param $api
     * @param $outsource
     * @param $paysheet
     */
    public function __construct($api, $outsource, $paysheet)
    {
        self::$API_PREFIX       = $api;
        self::$OUTSOURCE_PREFIX = $outsource;
        self::$PAYSHEET_PREFIX  = $paysheet;
    }

    public function getGroupsByCompany($company_id)
    {
        $url = $this->parseURL(self::$OUTSOURCE_PREFIX . self::$URL_GETGROUPSBYCOMPANY, array("company_id" => $company_id));

        return $this->doRequest(self::$GET_METHOD, $url);
    }

    /**
     * @param $users
     * @return string
     *
     * Add new document type for each user by company
     */
    public function addNewDocumentType($users)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_NEWDOCUMENTTYPE, array("users" => users));

        return $this->doRequest(self::$POST_METHOD, $url);
    }


}