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

    public static $DELETE_METHOD = "DELETE";
    public static $POST_METHOD   = "POST";
    public static $PUT_METHOD    = "PUT";
    public static $GET_METHOD    = "GET";

    public static $URL_GETGROUPSBYCOMPANY = "/paysheetGroup/{company_id}";

    /** USER API URL'S */
    // DOCUMENTS
    public static $URL_NEWDOCUMENTTYPE = "/documents/new_file_type/{users}";
    public static $URL_DOCUMENTSINVITE = "/documents/user/{user_id}/company/{company_id}/invite";
    public static $URL_DELETEDOCUMENTS = "/documents/user/{user_id}";

    // USER SALARY
    public static $URL_SETPAYMENTPERIOD = "/salary/user/{user_id}/pperiod/{payment_period_id}";
    public static $URL_CREATESALARY     = "/salary/user/{user_id}/company/{company_id}/{data}";
    public static $URL_DELETESALARY     = "salary/user/{user_id}";

    // USER INFO
    public static $URL_CREATEINFO = "/info/user/{user_id}/{data}";
    public static $URL_DELETEINFO = "info/user/{user_id}";

    // PROCESS
    public static $URL_PROCESS = "/process/user/{user_id}";

    // USER ADDRESS
    public static $URL_CREATEADDRESS = "/address/user/{user_id}/{data}";

    // USER BANK
    public static $URL_CREATEBANK = "/bank/user/{user_id}/{data}";
    public static $URL_DELETEBANK = "/bank/user/{user_id}";

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

    /**
     * @param $company_id
     * @return string
     */
    public function getGroupsByCompany($company_id)
    {
        $url = $this->parseURL(self::$OUTSOURCE_PREFIX . self::$URL_GETGROUPSBYCOMPANY, array("company_id" => $company_id));

        return $this->doRequest(self::$GET_METHOD, $url);
    }

    /**
     * @param $data
     * @param $userId
     * @return string
     */
    public function createUserInfo($userId, $data)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_CREATEINFO, array("user_id" => $userId, "data" => $data));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @return string
     */
    public function deleteInfoByUser($userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_DELETEINFO, array("user_id" => $userId));

        return $this->doRequest(self::$DELETE_METHOD, $url);
    }

    /**
     * @param $userId
     * @param $companyId
     * @param $data
     * @return string
     */
    public function createUserSalary($userId, $companyId, $data)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_CREATESALARY, array("user_id" => $userId, "company_id" => $companyId, "data" => $data));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @return string
     */
    public function deleteSalaryByUser($userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_DELETESALARY, array("user_id" => $userId));

        return $this->doRequest(self::$DELETE_METHOD, $url);
    }

    /**
     * @param $userId
     * @param $data
     * @return string
     */
    public function createUserAddress($userId, $data)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_CREATEADDRESS, array("user_id" => $userId, "data" => $data));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @param $data
     * @return string
     */
    public function createUserBank($userId, $data)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_CREATEBANK, array("user_id" => $userId, "data" => $data));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @return string
     */
    public function deleteBankByUser($userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_DELETEBANK, array("user_id" => $userId));

        return $this->doRequest(self::$DELETE_METHOD, $url);
    }

    /**
     * @param $users
     * @return string
     * Add new document type for each user by company
     */
    public function addNewDocumentType($users)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_NEWDOCUMENTTYPE, array("users" => users));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @return string
     * Delete fisical documents by user
     */
    public function deleteDocumentsByUser($userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_DELETEDOCUMENTS);

        return $this->doRequest(self::$DELETE_METHOD, $url);
    }

    /**
     * @param $userId
     * @param $companyId
     * @return string
     */
    public function createDocumentsWhenInvite($userId, $companyId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_DOCUMENTSINVITE, array("user_id" => $userId, "company_id" => $companyId));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $paymentPeriodId
     * @param $userId
     * @return string
     * Set payment period into user salary
     */
    public function setPaymentPeriod($paymentPeriodId, $userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_SETPAYMENTPERIOD, array("payment_period_id" => $paymentPeriodId, "user_id" => $userId));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @return string
     */
    public function createProcess($userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_PROCESS, array("user_id" => $userId));

        return $this->doRequest(self::$POST_METHOD, $url);
    }

    /**
     * @param $userId
     * @return string
     */
    public function deleteProcess($userId)
    {
        $url = $this->parseURL(self::$API_USERS . self::$URL_PROCESS, array("user_id" => $userId));

        return $this->doRequest(self::$DELETE_METHOD, $url);
    }

}