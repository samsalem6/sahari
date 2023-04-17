 $(window).load(function() {
                new $.popup({                
                    title       : '',
                    content         : '<a><img src="../images/popup_img.png" alt="Image" class="pop_img"><h3 id="pop_msg">Black Friday Offer<strong>10% OFF</strong> All Tours and Cruises</h3></a><small>From Friday to Monday</small>', 
					html: true,
					autoclose   : true,
					closeOverlay:true,
					closeEsc: true,
					buttons     : false,
                    timeout     : 5000 
                });
            });