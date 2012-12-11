<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); 

 $url = $jsonURL;
 preg_match_all('/%%.+?%%/', $url, $matches);
 if (count($matches) == 1) {
   for ($i=0; $i<count($matches[0]); $i++)
   {
     $vartoprocess = substr(substr($matches[0][$i], 0, strlen($matches[0][$i]) - 2), 2);
     $valuetoreplace = isset($_GET[$vartoprocess]) ? $_GET[$vartoprocess] : ""; 
     $url = str_replace($matches[0][$i], $valuetoreplace, $url);     
   }
 }
 
if (!$isEditMode) {
?>
<script language="javascript">
	// --- Contextmenu helper --------------------------------------------------
	function bindContextMenu(span) {
		// Add context menu to this node:
		$(span).contextMenu({menu: "myMenu"}, function(action, el, pos) {
			// The event was bound to the <span> tag, but the node object
			// is stored in the parent <li> tag
			var node = $.ui.dynatree.getNode(el);
			switch( action ) {
			default:
        try {
				  contextMenuHandler_applyAction(action, node);
        } catch (ex) {
        
        }
			}
		});
	};

	$(function(){
		$("#<?php echo $divId; ?>").dynatree({
			persist: true,
			onClick: function(node, event) {
				// Close menu on click
				if( $(".contextMenu:visible").length > 0 ){
					$(".contextMenu").hide();
				}
			},      
			onCreate: function(node, span){
				bindContextMenu(span);
			},
      onActivate: function(node) {
        if( node.data.url )
            window.open(node.data.url);
      },    
      initAjax: {
        url: "<?php echo $url; ?>"
      }
		});
	});
</script>
<?php
} else {
?><b>jQuery Dynatree - Not activated in edit mode</b>
<?php 
}
?>