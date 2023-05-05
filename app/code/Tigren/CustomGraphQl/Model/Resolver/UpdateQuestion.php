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

class UpdateQuestion implements ResolverInterface {
    protected $_resource;
    private $questionRepository;

    public function __construct(
        ResourceConnection $resource,
        \Tigren\CustomGraphQl\Model\CustomerGraphQl $questionRepository
    ) {
        $this->_resource = $resource;
        $this->questionRepository = $questionRepository;
    }

    public function resolve( Field $field, $context, ResolveInfo $info, array $value = null, array $args = null ) {
//        $connections = $this->_resource->getConnection();
//        $table       = $this->_resource->getTableName( 'tigren_customer_question' );
//        $connections->update( $table, [
//            'customer_name' => $args['name'],
//            'title'         => $args['title'],
//            'content'       => $args['content'],
//            'updated_at'    => date( 'Y-m-d H:i:s' )
//        ], 'id = ' . $args['id'] );
        $questionId = $args['id'];
        $question = $this->questionRepository->load($questionId);
        $question->setData($args);
        $question->save();

        return [
            'message' => __('Question updated successfully')
        ];
    }

}
