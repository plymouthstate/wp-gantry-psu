if(jQuery) (function($) {
	
	$.extend($.fn, {
		
		megaMenu: function(settings) {
			
			settings = $.extend(true, {
				effect: 'slideFade',
				horizontalPosition: 'left', // left, right, or center
				verticalPosition: 'bottom', // top or bottom
				showSpeed: 'fast',
				hideSpeed: 'fast',
				hoverIntent: {
					timeout: 250,
					interval: 125,
					sensitivity: 7
				}
				
			}, settings);
			
			$(this).each( function() {
				
				var $li = $(this),
					$a = $(this).find('A:first'),
					$panel = $(this).find('.panel'),
					panelTop,
					panelLeft,
					panelHeight = $panel.height(),
					panelOuterHeight = $panel.outerHeight(),
					panelWidth = $panel.width(),
					panelOuterWidth = $panel.outerWidth();
					
				$li.hoverIntent({
					
					timeout: settings.hoverIntent.timeout,
					interval: settings.hoverIntent.interval,
					sensitivity: settings.hoverIntent.sensitivity,
					
					over: function() {
						
						// Add hover state
						$li.addClass('hover');
						
						// Vertical position
						switch( settings.verticalPosition ) {
							case 'top':
								panelTop = $a.offset().top - panelOuterHeight;
								break;
							default:
							case 'bottom':
								panelTop = $a.offset().top + $a.outerHeight();
								break;
						}
						
						// Horizontal position
						switch( settings.horizontalPosition ) {
							case 'center':
								panelLeft = $a.offset().left - (panelOuterWidth / 2) + ($a.outerWidth() / 2);
								break;
							case 'right':
								panelLeft = $a.offset().left + $a.outerWidth() - panelOuterWidth;
								break;
							default:
							case 'left':
								panelLeft = $a.offset().left;
								break;
						}
						
						// Keep within viewport
						if( panelTop > $(window).height() ) panelTop = $(window).height() - panelOuterHeight;
						if( panelTop < 0 ) panelTop = 0;
						if( panelLeft + panelOuterWidth > $(window).width() ) panelLeft = $(window).width() - panelOuterWidth;
						if( panelLeft < 0 ) panelLeft = 0;
						
						// Position
						$panel
							.css({ top: panelTop, left: panelLeft, opacity: 1 })
							.stop(true, true);
						
						// Show effect
						switch( settings.effect ) {
							case 'slide':
							case 'slideFade':
								switch( settings.verticalPosition ) {
									case 'top':
										$panel
											.stop(true, true)
											.css({
												top: panelTop + panelHeight,
												height: 0,
												opacity: (settings.effect === 'slideFade' ? 0 : 1),
												display: 'block'
											})
											.animate({
												top: panelTop,
												height: panelHeight,
												opacity: 1
											}, settings.showSpeed);
										break;
									default:
									case 'bottom':
										$panel.slideDown(settings.showSpeed);
										break;
								}
								break;
							default:
							case 'fade':
								$panel.fadeIn(settings.showSpeed);
								break;
						}
						
					},
					
					out: function() {
						
						$panel.stop(true, true);
						
						// Hide effect
						switch( settings.effect ) {
							case 'slide':
							case 'slideFade':
								switch( settings.verticalPosition ) {
									case 'top':
										$panel
											.stop(true, true)
											.animate({
												top: panelTop + panelHeight,
												height: 0,
												opacity: (settings.effect === 'slideFade' ? 0 : 1)
											}, settings.hideSpeed, function() {
												$panel
													.css({
														height: panelHeight
													})
													.hide();
												$li.removeClass('hover');
											});
										break;
									default:
									case 'bottom':
										$panel.slideUp(settings.hideSpeed, function() {
											$li.removeClass('hover');
										});
										break;
								}
								break;
							default:
							case 'fade':
								$panel.fadeOut(settings.hideSpeed, function() {
									$li.removeClass('hover');
								});
								break;
						}
						
					}
					
				});
				
			});
			
		}
			
	});
	
})(jQuery);