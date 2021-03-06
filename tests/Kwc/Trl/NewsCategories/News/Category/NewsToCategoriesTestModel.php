<?php
class Kwc_Trl_NewsCategories_News_Category_NewsToCategoriesTestModel extends Kwc_NewsCategory_Category_Directory_NewsToCategoriesModel
{
    public function __construct()
    {
        $data = array(
            array('id'=>'1', 'news_id'=>1, 'category_id'=>1),
            array('id'=>'2', 'news_id'=>1, 'category_id'=>2),
            array('id'=>'3', 'news_id'=>2, 'category_id'=>1),
        );
        $config = array(
            'proxyModel'=>new Kwf_Model_FnF(array(
                'data' => $data
            ))
        );
        parent::__construct($config);
    }

    protected function _init()
    {
        parent::_init();
        $this->_referenceMap['Item']['refModelClass'] = 'Kwc_Trl_NewsCategories_News_TestModel';
        $this->_referenceMap['Category']['refModelClass'] = 'Kwc_Trl_NewsCategories_News_Category_CategoriesTestModel';
    }
}
