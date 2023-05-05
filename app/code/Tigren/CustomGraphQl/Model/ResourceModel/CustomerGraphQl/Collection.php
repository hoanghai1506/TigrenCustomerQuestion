<?php

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
