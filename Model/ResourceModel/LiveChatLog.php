<?php

namespace Aligent\LiveChat\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class LiveChatLog extends AbstractDb
{
    /**
     * @var string
     * The primary key field for the LiveChat log table.
     */
    protected $_idFieldName = 'livechat_log_id';

    /**
     * Initialize the resource model.
     *
     * @return void
     */
    protected function _construct()
    {
        // Initializes the resource model by specifying the table name and primary key field
        // 'aligent_livechat_log' is the database table for LiveChat logs
        // 'livechat_log_id' is the primary key column for this table
        $this->_init('aligent_livechat_log', 'livechat_log_id');
    }
}
