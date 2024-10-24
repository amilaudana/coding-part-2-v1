<?php

namespace Aligent\LiveChat\Controller\Adminhtml\Form;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Psr\Log\LoggerInterface;

class Index extends Action
{
    /**
     * @var PageFactory
     * The PageFactory is used to generate the result page for the controller's response.
     */
    protected $resultPageFactory;

    /**
     * @var LoggerInterface
     * The logger is used to log important information, warnings, or errors for debugging purposes.
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param Context $context
     * The context object provides access to the request, response, and other application-specific services.
     *
     * @param PageFactory $resultPageFactory
     * PageFactory is used to create the result page that will be rendered in the admin UI.
     *
     * @param LoggerInterface $logger
     * Logger interface allows logging messages and exceptions for tracking and debugging.
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        LoggerInterface $logger // Inject logger
    ) {
        parent::__construct($context); // Call the parent constructor to initialize the base context
        $this->resultPageFactory = $resultPageFactory; // Store the result page factory
        $this->logger = $logger; // Initialize the logger
    }

    /**
     * Execute method for controller
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        // Generate the result page for the admin form
        $resultPage = $this->resultPageFactory->create();

        // Set the active menu item in the admin panel (useful for highlighting the menu)
        $resultPage->setActiveMenu('Aligent_LiveChat::admin_form');

        // Set the page title for the admin page
        $resultPage->getConfig()->getTitle()->prepend(__('Live Chat Admin Form'));

        return $resultPage; // Return the generated page to be rendered
    }

    /**
     * Check if the user is allowed to access this controller
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        // Check if the user has permission to access the 'admin_form' resource in the ACL
        return $this->_authorization->isAllowed('Aligent_LiveChat::admin_form');
    }
}
