<?php

namespace Aligent\LiveChat\Controller\Adminhtml\Logs;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     * Factory to generate the result page for the admin panel.
     */
    protected $resultPageFactory;

    /**
     * @var ForwardFactory
     * Factory for forwarding requests to another controller/action.
     */
    protected $resultForwardFactory;

    /**
     * Constructor to inject dependencies and initialize the controller.
     *
     * @param Action\Context $context
     * Provides access to the request, response, session, and other necessary services.
     *
     * @param PageFactory $resultPageFactory
     * Used to generate the admin page.
     *
     * @param ForwardFactory $resultForwardFactory
     * Used to forward the request to another action if needed.
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;

        parent::__construct($context); // Call the parent constructor to initialize context
    }

    /**
     * Execute method to handle the controller logic when accessed.
     *
     * @return \Magento\Framework\View\Result\Page|\Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        // Check if the request is an AJAX request
        if ($this->getRequest()->getQuery('ajax')) {
            // If it's an AJAX request, forward the request to the 'grid' action
            $resultForward = $this->resultForwardFactory->create();
            $resultForward->forward('grid'); // Forward to the grid view for handling AJAX requests
            return $resultForward;
        }

        // If not an AJAX request, generate the full admin page to display logs
        $resultPage = $this->resultPageFactory->create();

        // Set the active menu item in the admin panel for navigation
        $resultPage->setActiveMenu('Aligent_LiveChat::view_logs');

        // Set the title of the page
        $resultPage->getConfig()->getTitle()->prepend(__('View Live Chat Logs'));

        return $resultPage; // Return the result page to be rendered
    }

    /**
     * Authorization check for accessing this controller.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        // Check if the user has the necessary permissions to access this controller
        return $this->_authorization->isAllowed('Aligent_LiveChat::menu');
    }
}
