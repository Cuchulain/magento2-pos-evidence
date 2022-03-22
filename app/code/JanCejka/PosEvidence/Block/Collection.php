<?php declare(strict_types=1);

namespace JanCejka\PosEvidence\Block;

use \Magento\Framework\View\Element\Template;

class Collection extends Template
{
    /**
     * @return Post[]
     */
    public function getCollection()
    {
        return 'getCollection function of the Block class called successfully';
    }
}
?>