<?php

/**
 * Copyright © Ariya InfoTech(Yuvraj Raulji) All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AriyaInfoTech\BackendOrderDelete\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper{

	const XML_PATH_BACKENDORDERDELETE = 'deleteorder/';

	public function getConfigValue($field, $storeId = null){
		return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
	}

	public function getGeneralConfig($code, $storeId = null){
		return $this->getConfigValue(self::XML_PATH_BACKENDORDERDELETE .'general/'. $code, $storeId);
	}
}