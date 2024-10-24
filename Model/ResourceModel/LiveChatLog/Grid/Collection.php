<?php

namespace Aligent\LiveChat\Model\ResourceModel\LiveChatLog\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Aligent\LiveChat\Model\ResourceModel\LiveChatLog as LiveChatLogResource;

class Collection extends SearchResult
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    protected function _construct()
    {
        // Initializes the collection, binding the model and resource model.
        // The first parameter is the model class, and the second is the resource model class.
        $this->_init(\Aligent\LiveChat\Model\LiveChatLog::class, LiveChatLogResource::class);
    }
}
