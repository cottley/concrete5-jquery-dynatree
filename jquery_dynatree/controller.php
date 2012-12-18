<?php   

defined('C5_EXECUTE') or die(_("Access Denied."));

class jquerydynatreePackage extends Package {

	protected $pkgHandle = 'jquery_dynatree';
	protected $appVersionRequired = '5.3.3'; 
	protected $pkgVersion = '1.0';
	
	public function getPackageDescription() {
		return t("Lets you add a block where you can create a tree using JSON.");
	}
	
	public function getPackageName() {
		return t("Jquery-dynatree");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('jquerydynatree', $pkg);
		
	}

}