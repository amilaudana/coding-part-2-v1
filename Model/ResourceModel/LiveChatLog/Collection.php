<?php

namespace Aligent\LiveChat\Model\ResourceModel\LiveChatLog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'livechat_log_id';

    /**
     * Initialize collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Aligent\LiveChat\Model\LiveChatLog::class,
            \Aligent\LiveChat\Model\ResourceModel\LiveChatLog::class
        );
    }
}
