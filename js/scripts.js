//on Hover show div function:: 

//Blur background on scroll:: 
    $(window).scroll(function(e) {

    var distanceScrolled = $(this).scrollTop();

    $('#big-video-wrap').css('-webkit-filter', 'blur('+distanceScrolled/180+'px)');
    $('#big-video-wrap').css('-moz-filter', 'blur('+distanceScrolled/180+'px)');
    $('#big-video-wrap').css('-o-filter', 'blur('+distanceScrolled/180+'px)');
    $('#big-video-wrap').css('-ms-filter', 'blur('+distanceScrolled/180+'px)');
	 $('#big-video-wrap').css('filter', 'blur('+distanceScrolled/180+'px)');
    });

    $('#map li').hover(function(){ 
        $('span[data="'+$(this).attr("id")+'"]').show(); 
    }, function(){ 
         $('span[data]').stop().hide();   
    }); 
	
	$('.pre-loader').delay(1500).fadeOut('slow'); 

   
  



    $('.passon').click(function(){ 
        $('select[name="stack"]').val($(this).attr("billboard"))
    });  



	// Browser Detect Script:: 
	
	var BrowserDetect = {
        init: function () {
            this.browser = this.searchString(this.dataBrowser) || "Other";
            this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
        },
        searchString: function (data) {
            for (var i = 0; i < data.length; i++) {
                var dataString = data[i].string;
                this.versionSearchString = data[i].subString;

                if (dataString.indexOf(data[i].subString) !== -1) {
                    return data[i].identity;
                }
            }
        },
        searchVersion: function (dataString) {
            var index = dataString.indexOf(this.versionSearchString);
            if (index === -1) {
                return;
            }

            var rv = dataString.indexOf("rv:");
            if (this.versionSearchString === "Trident" && rv !== -1) {
                return parseFloat(dataString.substring(rv + 3));
            } else {
                return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
            }
        },

        dataBrowser: [
            {string: navigator.userAgent, subString: "Chrome", identity: "Chrome"},
            {string: navigator.userAgent, subString: "MSIE", identity: "Explorer"},
            {string: navigator.userAgent, subString: "Trident", identity: "Explorer"},
            {string: navigator.userAgent, subString: "Firefox", identity: "Firefox"},
            {string: navigator.userAgent, subString: "Safari", identity: "Safari"},
            {string: navigator.userAgent, subString: "Opera", identity: "Opera"}
        ]

    };
    
