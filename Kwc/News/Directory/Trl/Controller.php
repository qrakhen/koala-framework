<?php
class Kwc_News_Directory_Trl_Controller extends Kwc_Directories_Item_Directory_Trl_Controller
{
    protected $_defaultOrder = array('field' => 'publish_date', 'direction' => 'DESC');

    protected function _initColumns()
    {
        $this->_columns->add(new Kwf_Grid_Column('title', trlKwf('Title'), 300));
        parent::_initColumns();
        $this->_columns->add(new Kwf_Grid_Column_Date('publish_date', trlKwf('Publish Date')));
        $this->_columns->add(new Kwf_Grid_Column_Visible('visible'));
    }
}
