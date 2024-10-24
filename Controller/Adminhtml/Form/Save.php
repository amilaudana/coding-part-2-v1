<?php

namespace Aligent\LiveChat\Controller\Adminhtml\Form;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aligent\LiveChat\Api\LiveChatLogRepositoryInterface;
use Aligent\LiveChat\Model\LiveChatLogFactory;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

class Save extends Action
{
    /**
     * @var PageFactory
     * Used to generate pages when needed, though not directly utilized in this class.
     */
    protected $resultPageFactory;

    /**
     * @var LiveChatLogRepositoryInterface
     * Repository for saving LiveChat logs, adhering to the repository pattern.
     */
    protected $logRepository;

    /**
     * @var LiveChatLogFactory
     * Factory to create instances of the LiveChatLog model.
     */
    protected $logFactory;

    /**
     * @var LoggerInterface
     * Logger for logging errors or other messages for debugging.
     */
    protected $logger;

    /**
     * Constructor to initialize dependencies.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param LiveChatLogRepositoryInterface $logRepository
     * @param LiveChatLogFactory $logFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        LiveChatLogRepositoryInterface $logRepository,
        LiveChatLogFactory $logFactory,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->logRepository = $logRepository;
        $this->logFactory = $logFactory;
        $this->logger = $logger;
    }

    /**
     * Execute method to handle the form submission and save the LiveChat log.
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        try {
            // Retrieve the form data from the POST request
            $liveChatFormData = $this->getRequest()->getPost('livechat');

            // Check if there is any form data to process
            if ($liveChatFormData) {
                // Create a new instance of LiveChatLog model using the factory
                $log = $this->logFactory->create();

                // Set the form data into the LiveChat log model
                $log->setData($liveChatFormData);

                // Save the log data using the repository
                $this->logRepository->save($log);

                // Add a success message if the log is saved successfully
                $this->messageManager->addSuccessMessage(__('LiveChat Log saved successfully.'));
            }
        } catch (\Exception $e) {
            // Handle any exception that occurs during the save operation
            // Log the error message for debugging
            $this->logger->error($e->getMessage());

            // Display an error message to the admin user
            $this->messageManager->addErrorMessage(__('Error saving LiveChat Log.'));
        }

        // Redirect the user back to the index page after save or error
        return $this->_redirect('*/*/index');
    }
}
