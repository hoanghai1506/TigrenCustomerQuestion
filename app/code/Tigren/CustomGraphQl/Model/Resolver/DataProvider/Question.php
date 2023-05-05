<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */


namespace Tigren\CustomGraphQl\Model\Resolver\DataProvider;

class Question {
    protected $question;


    public function __construct(
        \Tigren\CustomGraphQl\Model\CustomerGraphQl $question
    ) {
        $this->question = $question;
    }

    public function insertQuestion( $data ) {
        if ( is_array( $data ) ) {
            $this->question->setData( $data )->save();

            return [ 'message' => 'Success' ];
        }

        return [ 'message' => 'Fail' ];
    }
}
