<?php

namespace Admin\Controller;

use Admin\ViewModel\ProductionCompanies;
use Application\Mvc\Controller;
use Exception;
use Smu\Model;
use Smu\Table;
use Zend\View\Model\ViewModel;

/**
 * Admin ProductionCompanies controller
 */
class ProductionCompaniesController extends Controller {
	/**
	 * List all companies
	 */
	public function indexAction() {
		return new ViewModel();
	}	
}
