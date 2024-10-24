<?php

namespace Aligent\LiveChat\Model;

use Aligent\LiveChat\Api\Data\LiveChatLogInterface;
use Aligent\LiveChat\Api\LiveChatLogRepositoryInterface;
use Aligent\LiveChat\Model\ResourceModel\LiveChatLog as ResourceLiveChatLog;
use Magento\Framework\Exception\CouldNotSaveException;

class LiveChatLogRepository implements LiveChatLogRepositoryInterface
{
    /**
     * @var ResourceLiveChatLog
     */
    protected $resource;

    /**
     * Constructor to inject the resource model.
     *
     * @param ResourceLiveChatLog $resource
     * The resource model responsible for database interactions.
     */
    public function __construct(
        ResourceLiveChatLog $resource
    ) {
        // Assign the injected resource model to the class property
        $this->resource = $resource;
    }

    /**
     * Save LiveChat Log
     *
     * @param LiveChatLogInterface $liveChatLog
     * The LiveChat log entity that needs to be saved.
     *
     * @return LiveChatLogInterface
     * Returns the saved LiveChat log entity.
     *
     * @throws CouldNotSaveException
     * Throws an exception if there is an issue with saving the log to the database.
     */
    public function save(LiveChatLogInterface $liveChatLog)
    {
        try {
            // Use the resource model to save the LiveChat log to the database
            $this->resource->save($liveChatLog);
        } catch (\Exception $exception) {
            // If something goes wrong, throw a CouldNotSaveException with a message
            throw new CouldNotSaveException(__('Could not save LiveChat Log: %1', $exception->getMessage()));
        }
        // Return the saved LiveChat log entity
        return $liveChatLog;
    }
}
