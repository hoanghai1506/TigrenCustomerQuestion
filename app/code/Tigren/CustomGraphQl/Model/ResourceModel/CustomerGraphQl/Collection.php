<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Tigren\CustomGraphQl\Model\ResourceModel\CustomerGraphQl;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection {
    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Tigren\CustomGraphQl\Model\CustomerGraphQl::class,
            \Tigren\CustomGraphQl\Model\ResourceModel\CustomerGraphQl::class
        );
    }

}
