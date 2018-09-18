<?php
namespace Dmelnyk\BackUiComponent\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'dmelnyk_backuicomponent_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dmelnyk\BackUiComponent\Model\Post', 'Dmelnyk\BackUiComponent\Model\ResourceModel\Post');
    }

}

