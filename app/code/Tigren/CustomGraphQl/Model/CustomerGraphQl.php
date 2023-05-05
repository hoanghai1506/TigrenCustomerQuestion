<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Tigren\CustomGraphQl\Model;
use Magento\Framework\Model\AbstractModel;
class CustomerGraphQl extends AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tigren_customer_question';

    protected $_cacheTag = 'tigren_customer_question';

    protected $_eventPrefix = 'tigren_customer_question';

    protected function _construct()
    {
        $this->_init('Tigren\CustomGraphQl\Model\ResourceModel\CustomerGraphQl');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
