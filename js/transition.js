$( function() {
	// 'use strict';
	if( !$("#page").data( "smoothState" ) ) {
		var body = $("html,body");
		var content = $("#page").smoothState({
			// When page unloads ( start loading next page )
			onStart: {
				duration: 800,
				render: function( element ) {

					var animwrapper = $("#anim-wrapper");

					// Add reverse class and start animation
					// If the anim is saved, use it, otherwise, search it
					var anim = "";
					if( animwrapper.data("anim") ) {
						anim = animwrapper.data("anim");
						animwrapper.removeClass( anim );
						animwrapper.addClass( anim+"Exit" );
					}
						
					content.restartCSSAnimations();

					// Scroll back to top of page
					body.animate({ 'scrollTop': 0 });
				}
			},

			// When page has loaded ( ready to display content )
			onReady: {
				duration: 0,
				render: function( element, newContent ) {
					
					// Load new content
					$( "#anim-wrapper" ).remove();
					element.html( newContent );

					// Save new wrapper's animation
					saveData();
					
					// Restart Animations
					content.restartCSSAnimations();
					
				}
			},
			forms: "form",
			debug: true
		}).data( 'smoothState' );
		saveData();
	}

	function saveData() {
		var anim="";
		var classes = $("#anim-wrapper").classes();
		console.log( classes );
		for( var i=0; i<classes.length; i++ ) if( classes[i].substr( 0,4 ) == "anim" ) { anim = classes[i]; break; }
		$("#anim-wrapper").data( "anim",anim );
	}
});
