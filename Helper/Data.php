<?php

/**
 * Copyright © Ariya InfoTech(Yuvraj Raulji) All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AriyaInfoTech\BackendOrderDelete\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
    *@var ScopeConfigInterface
    */

	protected $_scopeConfig;

	 /**
     * Constructor
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    
	public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
	) {
		$this->_scopeConfig = $scopeConfig;
		parent::__construct($context);
	}

	/*
    *get config value for enable/disable
    **/
    
	public function isModuleEnabel()
	{
		return $this->_scopeConfig->getValue('orderdelete/general/enable',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	}
}