<?php

namespace Aligent\LiveChat\Model\LiveChatLog;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProviderInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Aligent\LiveChat\Model\ResourceModel\LiveChatLog\Grid\CollectionFactory;
use Psr\Log\LoggerInterface;

class LogDataProvider extends AbstractDataProvider implements DataProviderInterface
{
    /**
     * @var array
     * Holds the loaded data, once fetched, to avoid multiple queries.
     */
    protected $loadedData;

    /**
     * @var LoggerInterface
     * Logger for logging information, errors, or debugging purposes.
     */
    protected $logger;

    /**
     * Constructor to initialize dependencies and set up the data provider.
     *
     * @param string $name
     * Name of the data provider, typically used in the UI configuration.
     *
     * @param string $primaryFieldName
     * The primary field used in the collection to uniquely identify records (e.g., 'livechat_log_id').
     *
     * @param string $requestFieldName
     * The field name used in requests to fetch the relevant records (e.g., 'id').
     *
     * @param CollectionFactory $collectionFactory
     * The factory used to create the collection of LiveChat logs from the database.
     *
     * @param LoggerInterface $logger
     * Logger interface for logging any information or errors during data fetching.
     *
     * @param array $meta
     * Additional metadata for the data provider, typically related to UI component configurations.
     *
     * @param array $data
     * Additional data for the data provider, typically related to UI component configurations.
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        LoggerInterface $logger,  // Inject the logger
        array $meta = [],
        array $data = []
    ) {
        // Initialize the collection using the factory to retrieve LiveChat log data
        $this->collection = $collectionFactory->create();
        // Initialize the logger for logging purposes
        $this->logger = $logger;

        // Call the parent constructor to initialize the data provider
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Retrieves the data that will be provided to the UI component
     *
     * @return array
     * Returns an array of data to be consumed by the UI component.
     */
    public function getData()
    {
        // If data has already been loaded, return it to avoid redundant queries
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        // Fetch items from the collection (each item is a LiveChat log)
        $items = $this->collection->getItems();

        // Iterate over each item and store its data using the item's ID as the key
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }

        // Return the loaded data to the UI component
        return $this->loadedData;
    }
}
