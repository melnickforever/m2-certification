<?php

namespace Dmelnyk\BlockViewModel\Model;

use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Date implements ArgumentInterface
{
    /**
     * @var DateTime
     */
    protected $dateTime;

    public function __construct(DateTime $dateTime)
    {

        $this->dateTime = $dateTime;
    }

    public function getGMT()
    {
        return $this->dateTime->gmtDate();
    }
}