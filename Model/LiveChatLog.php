<?php

namespace Aligent\LiveChat\Model;

use Aligent\LiveChat\Api\Data\LiveChatLogInterface;
use Magento\Framework\Model\AbstractModel;

class LiveChatLog extends AbstractModel implements LiveChatLogInterface
{
    /**
     * Public constants for LiveChat Log fields
     */
    public const ID = 'livechat_log_id';
    public const LICENSE_NUMBER = 'livechat_license_number';
    public const GROUPS = 'livechat_groups';
    public const PARAMS = 'livechat_params';
    public const ACTION = 'action';
    public const UPDATED_AT = 'updated_at';

    /**
     * Initialize the resource model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Aligent\LiveChat\Model\ResourceModel\LiveChatLog::class);
    }

    /**
     * Get LiveChat log ID.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set LiveChat log ID.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get license number.
     *
     * @return string|null
     */
    public function getLicenseNumber()
    {
        return $this->getData(self::LICENSE_NUMBER);
    }

    /**
     * Set license number.
     *
     * @param string $licenseNumber
     * @return $this
     */
    public function setLicenseNumber($licenseNumber)
    {
        return $this->setData(self::LICENSE_NUMBER, $licenseNumber);
    }

    /**
     * Get groups.
     *
     * @return string|null
     */
    public function getGroups()
    {
        return $this->getData(self::GROUPS);
    }

    /**
     * Set groups.
     *
     * @param string $groups
     * @return $this
     */
    public function setGroups($groups)
    {
        return $this->setData(self::GROUPS, $groups);
    }

    /**
     * Get params.
     *
     * @return string|null
     */
    public function getParams()
    {
        return $this->getData(self::PARAMS);
    }

    /**
     * Set params.
     *
     * @param string $params
     * @return $this
     */
    public function setParams($params)
    {
        return $this->setData(self::PARAMS, $params);
    }

    /**
     * Get action.
     *
     * @return string|null
     */
    public function getAction()
    {
        return $this->getData(self::ACTION);
    }

    /**
     * Set action.
     *
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Get updated at timestamp.
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated at timestamp.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
