<?php    
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class JquerydynatreeBlockController extends BlockController {
		
		var $pobj;
		 
		protected $btTable = 'btJquerydynatree';
		protected $btInterfaceWidth = "400";
		protected $btInterfaceHeight = "230";
		
		public $divId = "";
		public $jsonURL = "";
		//public $jsonURLType = "json";
		
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Lets you add a block that will create a tree using JSON.");
		}
		
		public function getBlockTypeName() {
			return t("jQuery Dynatree");
		}
				
		function __construct($obj = null) {		
			parent::__construct($obj);	
		}
    
    public function on_page_view() {
      $bv = new BlockView();
      $bv->setBlockObject($this->getBlockObject());
      $blockURL = $bv->getBlockURL();
      $html = Loader::helper('html');            
      $this->addHeaderItem($html->javascript("{$blockURL}/dynatree-1.2.2/jquery/jquery-ui.custom.js"));
      $this->addHeaderItem($html->javascript("{$blockURL}/dynatree-1.2.2/jquery/jquery.cookie.js"));
      $this->addHeaderItem($html->css("{$blockURL}/dynatree-1.2.2/src/skin-vista/ui.dynatree.css"));
      $this->addHeaderItem($html->javascript("{$blockURL}/dynatree-1.2.2/src/jquery.dynatree.js"));

      // jquery.contextmenu,  A Beautiful Site (http://abeautifulsite.net/)
      $this->addHeaderItem($html->javascript("{$blockURL}/dynatree-1.2.2/doc/contextmenu/jquery.contextMenu-custom.js"));
      $this->addHeaderItem($html->css("{$blockURL}/dynatree-1.2.2/doc/contextmenu/jquery.contextMenu.css"));

      $pg = Page::getCurrentPage();
      $this->set('isEditMode', $pg->isEditMode());
		}
    
		function view(){ 
			$this->set('divId', $this->divId);	
			$this->set('jsonURL', $this->jsonURL); 
			//$this->set('jsonURLType', $this->jsonURLType);
		}
		
		function save($data) { 
			$args['divId'] = isset($data['divId']) ? trim($data['divId']) : '';
			$args['jsonURL'] = isset($data['jsonURL']) ? trim($data['jsonURL']) : '';
			//$args['jsonURLType'] = isset($data['jsonURLType']) ? trim($data['jsonURLType']) : '';
			parent::save($args);
		}
		
	}
	
?>