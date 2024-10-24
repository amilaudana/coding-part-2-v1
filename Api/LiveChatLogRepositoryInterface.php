<?php

namespace Aligent\LiveChat\Api;

use Aligent\LiveChat\Api\Data\LiveChatLogInterface;
use Magento\Framework\Exception\CouldNotSaveException;

interface LiveChatLogRepositoryInterface
{
    /**
     * Save LiveChat Log
     *
     * This method is responsible for saving the LiveChat log entry into the system.
     *
     * @param LiveChatLogInterface $liveChatLog
     * The LiveChat log entry to be saved, which should contain necessary data
     *
     * @return LiveChatLogInterface
     * Upon successful save operation, the same LiveChat log instance is returned
     *
     * @throws CouldNotSaveException
     * If there is any issue during the save operation, a CouldNotSaveException
     * will be thrown to handle cases like database errors, validation failures, etc.
     */
    public function save(LiveChatLogInterface $liveChatLog);
}
