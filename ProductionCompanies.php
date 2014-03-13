<?php

namespace Smu\Command;

use Admin\Filter;
use Smu\Command;
use Smu\Model;
use Smu\Table;

/**
 * ProductionCompanies related commands
 */
class ProductionCompanies extends Command {
	/**
	 * Do a title lookup based on a simple query
	 *
	 * @return array
	 */
	public function search() {
		$table = new Table\ProductionCompanies();
		return $table->ajaxSearch($this->_parameters['term']);
	}
	/**
	 * Do a lookup to grab companies for the admin area
	 */
	public function lookupForAdmin() {
		// Setup the account filter object
		$filter = new Filter\ProductionCompanies();
		$filter->searchTerm = $this->_parameters['query'];
		$filter->limit = $this->_parameters['limit'];
		$filter->page = $this->_parameters['page'];
		
		// Spit it out
		$table = new Table\ProductionCompanies();
		return $this->partial('/partial/ajax/companies/admin-search.phtml', array(
			'model' => $table->getListBy($filter)
		));
	}
	
	public function renameForAdmin() {
		
		$IdList = $this->_parameters['IdList'];
		$SelectId = $this->_parameters['SelectId'];
		$NameList = $this->_parameters['NameList'];
		$SelectName = $this->_parameters['SelectName'];

		foreach ($NameList as $name){
			//update jobs table
			$job = new Table\Jobs();
			$job->update(array("Company" => $SelectName), array("Company" => $name));		
		}	
	
		foreach ($IdList as $id){		
			//update credit table			
			$credit = new Table\Credits();
			$credit->update(array("ProductionCompanyID" => $SelectId), array("ProductionCompanyID" => $id));			
			
			if ($id != $SelectId){
				//delete extra production companies
				$company = new Table\ProductionCompanies();
				$company->delete(array("ProductionCompanyID" => $id));
			}						
		}
	}	
}

?>