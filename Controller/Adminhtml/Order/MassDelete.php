<?php

namespace AriyaInfoTech\BackendOrderDelete\Controller\Adminhtml\Order;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\Sales\Controller\Adminhtml\Order\AbstractMassAction;
use AriyaInfoTech\BackendOrderDelete\Helper\Data as backedorderdeletehelper;

class MassDelete extends AbstractMassAction
{
    /**
     * @var backedorderdeletehelper
     */
    protected $_backedorderdeletehelper;
 
    /**
     * Constructor
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param backedorderdeletehelper $backedOrderdeleteHelper
     */

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        backedorderdeletehelper $backedOrderdeleteHelper
    ) {
        parent::__construct($context, $filter);
        $this->collectionFactory = $collectionFactory;
        $this->_backedorderdeletehelper = $backedOrderdeleteHelper;
    }

    /**
     * @param AbstractCollection $collection
     * @return \Magento\Backend\Model\View\Result\Redirect
     * massAction function is use for mass delete or single delete
     */
    protected function massAction(AbstractCollection $collection)
    {
        $bsckednEnabelDisabel = $this->_backedorderdeletehelper->isModuleEnabel();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($this->getComponentRefererUrl());
        if ($bsckednEnabelDisabel == 1) {
            $count = 0;
            foreach ($collection->getItems() as $order) {
                $order->delete();
                $count++;
            }
            if ($count) {
                $this->messageManager->addSuccess(__('%1 order(s) have been deleted.', $count));
            } else {
                $this->messageManager->addError(__('There is a problem.'));
            }
        } else {
            $this->messageManager->addError(__('Please Enable Module And Try Again'));
        }
        return $resultRedirect;
    }
}
