<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\CustomGraphQl\Model\Resolver;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CreateQuestion implements ResolverInterface {
    protected $_resource;
    private $dataProvider;

    public function __construct(
        ResourceConnection $resource,
        \Tigren\CustomGraphQl\Model\Resolver\DataProvider\Question $dataProvider
    ) {
        $this->_resource    = $resource;
        $this->dataProvider = $dataProvider;
    }

    public function resolve( Field $field, $context, ResolveInfo $info, array $value = null, array $args = null ) {
//       $connections = $this->_resource->getConnection();
//         $table = $this->_resource->getTableName('tigren_customer_question');
//        $connections->insert($table, [
//             'customer_name' => $args['name'],
//             'title' => $args['title'],
//             'content' => $args['content'],
//             'created_at' => date('Y-m-d H:i:s'),
//             'updated_at' => date('Y-m-d H:i:s')
//         ]);
        try {
            return $this->dataProvider->insertQuestion( $args );
        } catch ( \Exception $e ) {
            throw new GraphQlInputException( __( $e->getMessage() ) );
        }
    }
}
