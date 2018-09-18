<?php

namespace Dmelnyk\BackUiComponent\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'dmelnyk_backuicomponent_post';

    protected $_cacheTag = 'dmelnyk_backuicomponent_post';

    protected $_eventPrefix = 'dmelnyk_backuicomponent_post';

    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}