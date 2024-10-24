<?php

namespace Aligent\LiveChat\Api\Data;

/**
 * Interface LiveChatLogInterface
 *
 * Defines the interface for the LiveChat Log model.
 */
interface LiveChatLogInterface
{
    /**
     * Constants for keys of data array
     * Identifies the fields in the database.
     */
    public const ID = 'livechat_log_id';
    public const LICENSE_NUMBER = 'livechat_license_number';
    public const GROUPS = 'livechat_groups';
    public const PARAMS = 'livechat_params';
    public const ACTION = 'action';
    public const UPDATED_AT = 'updated_at';

    /**
     * Get the LiveChat log ID.
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set the LiveChat log ID.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get the LiveChat license number.
     *
     * @return string|null
     */
    public function getLicenseNumber();

    /**
     * Set the LiveChat license number.
     *
     * @param string $licenseNumber
     * @return $this
     */
    public function setLicenseNumber($licenseNumber);

    /**
     * Get the LiveChat groups.
     *
     * @return string|null
     */
    public function getGroups();

    /**
     * Set the LiveChat groups.
     *
     * @param string $groups
     * @return $this
     */
    public function setGroups($groups);

    /**
     * Get the LiveChat params.
     *
     * @return string|null
     */
    public function getParams();

    /**
     * Set the LiveChat params.
     *
     * @param string $params
     * @return $this
     */
    public function setParams($params);

    /**
     * Get the LiveChat action.
     *
     * @return string|null
     */
    public function getAction();

    /**
     * Set the LiveChat action.
     *
     * @param string $action
     * @return $this
     */
    public function setAction($action);

    /**
     * Get the LiveChat log last updated time.
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set the LiveChat log last updated time.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}
