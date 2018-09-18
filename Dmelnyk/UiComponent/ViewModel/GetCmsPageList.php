<?php
namespace Dmelnyk\UiComponent\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class GetCmsPageList implements ArgumentInterface
{
    /**
     * @var \Magento\Cms\Model\PageRepository
     */
    protected $pageRepository;
    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;
    /**
     * @var \Magento\Framework\UrlInterface
     */
    public $url;

    public function getTitle()
    {
        return "Hello World";
    }

    public function __construct(
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->pageRepository = $pageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->url = $url;
    }

    public function getCmsPagesJson()
    {
        $result = [];
        foreach ($this->getItems() as $page) {
            $result[$page->getIdentifier()] = [
                "title" => $page->getTitle(),
                "url" => $this->url->getUrl($page->getIdentifier())
            ];
        }
        return json_encode($result);
    }

    protected function getItems()
    {
        $criteriaBuilder = $this->searchCriteriaBuilder
            ->addFilter("is_active", 1)
            ->create();
        $data = $this->pageRepository->getList($criteriaBuilder);
        return $data->getItems();
    }

}