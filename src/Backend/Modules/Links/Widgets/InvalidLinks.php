<?php

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/**
 * This widget will show the invalid links
 *
 * @author John Poelman <john.poelman@bloobz.be>
 */
class BackendLinksWidgetInvalidLinks extends BackendBaseWidget
{
	/**
	 * The links
	 *
	 * @var	array
	 */
	private $links;
	
	/**
	 * Autodelete
	 *
	 * @var	bool
	 */
	private $autodelete;

	/**
	 * Execute the widget
	 */
	public function execute()
	{
		$this->setColumn('middle');
		$this->setPosition(2);
		$this->loadData();
		$this->parse();
		$this->display();
	}

	/**
	 * Load the data
	 */
	private function loadData()
	{
		// get invalid links
		$this->links = BackendLinksModel::getInvalidLinks();
		
		// check if autodelete is set
		$this->autodelete = BackendModel::getModuleSetting('links', 'autodelete');
	}

	/**
	 * Parse into template
	 */
	private function parse()
	{
		$this->tpl->assign('invalidLinks', $this->links);
		$this->tpl->assign('autodelete', $this->autodelete);
	}
}