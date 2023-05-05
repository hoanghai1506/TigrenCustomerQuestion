<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Tigren\CustomGraphQl\Model\Resolver;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\ResourceConnection;

class Question implements ResolverInterface{
    protected $_resource;
    public function __construct(  ResourceConnection $resource) {
        $this->_resource = $resource;
    }
    public function resolve( Field $field, $context, ResolveInfo $info, array $value = null, array $args = null) {
       $connections = $this->_resource->getConnection();
         $table = $this->_resource->getTableName('tigren_customer_question');
       $sql = $connections->select()
            ->from($table);
        $result = $connections->fetchAll($sql);
        return $result;

    }


}
