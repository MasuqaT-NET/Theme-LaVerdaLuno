/*
 * Bones Scripts File
 * Author: Eddie Machado
 * Editor: MasuqaT
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();


}); /* end of as page load scripts */

jQuery(document).ready(function ($) {
  
  // Dropdown menu animation
	$('.menu-bar ul ul.children').hide();
	$('.menu-bar ul li').hover( 
		function() {
			$(this).children('ul.children').slideDown('fast');
		}, 
		function() {
			$(this).children('ul.children').hide();
		}
	);
	
  // Mobile menu smooth toggle height
	$('.menu-toggle').on('click', function() {
		$('.menu-toggle').toggleClass('active');
		slide($('.menu-bar > ul', $(this).parent()));
	});
	 
	function slide(content) {
		var wrapper = content.parent();
		var contentHeight = content.outerHeight(true);
		var wrapperHeight = wrapper.height();
	 
		wrapper.toggleClass('menu-expand');
		if (wrapper.hasClass('menu-expand')) {
		setTimeout(function() {
			wrapper.addClass('transition').css('height', contentHeight);
		}, 10);
	}
	else {
		setTimeout(function() {
			wrapper.css('height', wrapperHeight);
			setTimeout(function() {
			wrapper.addClass('transition').css('height', 0);
			}, 10);
		}, 10);
	}
	 
	wrapper.one('transitionEnd webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd', function() {
		if(wrapper.hasClass('open')) {
			wrapper.removeClass('transition').css('height', 'auto');
		}
	});
	}

  // Header search
  $('.search-toggle').click(function(){
  $('.search-toggle').toggleClass('active');
  $('.search-expand').fadeToggle(250);
    setTimeout(function(){
        $('.search-expand input').focus();
    }, 300);
	});
});

/////////////////////////////////
// 折り畳み式アーカイブウィジェット
// http://nelog.jp/folding-archive-widget をいろいろ改造
/////////////////////////////////
(function($) {
  $(function() {
    var wgts = $(".widget_archive");//アーカイブウィジェット全てを取得
    //アーカイブウィジェットを1つずつ処理する
    wgts.each(function(i, el) {
      wgt = $(el);

      //日付表示＋投稿数か
      var has_date_count = wgt.text().match(/\d+年\d+月\s\(\d+\)/);
      //日付表示だけか
      var has_date_only = wgt.text().match(/\d+年\d+月/) && !has_date_count;

      //日付表示されているとき（ドロップダウン表示でない時）
      if ( has_date_count || has_date_only ) {
        var
          clone = wgt.clone(),//アーカイブウィジェットの複製を作成
          year_buf = [];
        //クローンはウィジェットが後にに挿入。クローンはcssで非表示
        wgt.after(clone);
        clone.attr("class", "archive_clone").addClass('hide');

        var
          acv = wgt; //ウィジェット
          acvLi = acv.find("li"); //ウィジェット内のli全て
        //ul.yearsをアーカイブウィジェット直下に追加してそのDOMを取得
        var acv_years =  acv.append('<ul class="years"></ul>').find("ul.years");

        //liのテキストから年がどこからあるかを調べる
        acvLi.each(function(i) {
          var reg = /(\d+)年(\d+)月\s\((\d+)\)/;
          var dt = $(this).text().match(reg);
          year_buf.push([parseInt(dt[1]), parseInt(dt[3])]);
        });
		
        var yr = year_buf.reduce( function (prev, item) { 
			if ( item[0] in prev ) {
				prev[item[0]] = prev[item[0]] + item[1]; 
			} else {
				prev[item[0]] = item[1]; 
			}
			return prev; 
		}, {} );

		// [[2014, 2], [2015, 5], [2016, 2]]
		var years = Object.keys(yr).map(function (key) {return [parseInt(key), yr[key]]; }).reverse();

        acvLi.unwrap(); //liの親のulを解除
		
		var lb = $($(acvLi[0]).children()[0]).attr('href');
		var yearUrlBase = lb.replace(/\d+\/\d+\/$/g, '');

        //投稿年があるだけ中にブロックを作る
		for(var i = 0; i < years.length; i++) {
			acv_years.append("<li class='year_" + years[i][0] + "'><a class='year' href='" + yearUrlBase + years[i][0] + "/'>" + years[i][0] + "年</a> <a class='year-opener'>(" + years[i][1] + ")</a><ul class='month'></ul></li>");
		}

        //作ったブロック内のulに内容を整形して移動
        //オリジナルのクローンは順番に削除
        var j = 0;
        acvLi.each(function(i, el) {
          var reg = /(\d+)年(\d+)月/;
          //日付表示＋投稿数か
          if ( has_date_count ) {
            reg = /(\d+)年(\d+)月\s\((\d+)\)/;
          }
          var
            dt = $(this).text().match(reg),
            href = $(this).find("a").attr("href");

          //月の追加
          var rTxt = "<li><a href='" + href + "'>" + "" + dt[2] + "月</a>";
          //日付表示＋投稿数か
          if ( has_date_count ) {
            rTxt += " (" + dt[3] + ")" + "</li>"; //投稿数の追加
          }

          //作成した月のHTMLを追加、不要なものは削除
          if (years[j][0] === parseInt(dt[1])) {
            acv_years.find(".year_" + years[j][0] + " ul").append(rTxt);
            $(this).remove();
          } else {
            j++;
            acv_years.find(".year_" + years[j][0] + " ul").append(rTxt);
            $(this).remove();
          }
        });

        //クローン要素を削除
        clone.remove();

        //直近の年の最初以外は.hide
		var recentUl = acv.find("ul.years ul:not(:first)");
		recentUl.prev().addClass("closed");
        recentUl.addClass("hide");

        //年をクリックでトグルshow
        acv.find("a.year-opener").on("click", function() {
			$(this).toggleClass("closed");
        	$(this).next().toggleClass("hide");
        });
      }//if has_date_count || has_date_only
    });//wgts.each

  });

})(jQuery);

/////////////////////////////////
// TabIndex設定用
/////////////////////////////////

function targetize(element) {
  element.attr("tabIndex", "0");
  element.focus(function() {
    element.on('keydown', function(e) {
      if(!(!e) && e.keyCode === 13) { // Enter key
        element.click();
      }
    });
  });
  element.blur(function() {
    element.off('keydown');
  });
}

function targetize_navbar(selector) {
    // navigation
    $(selector).find("li > a").each(function() {
      $(this).attr("tabIndex", "0");
      if($(this).next().length > 0) { // has sub-menu;
        $(this).focus(function() {
          $(this).parent().addClass("jqhover");
        });
      }
    });
    $(window).on('keydown keyup', function(e) {
      if(!(!e) && e.keyCode === 9) {
        console.debug("Tab pressed.");
        $(selector).find("li").filter(function(index){ return $(this).children("ul").length > 0; }).each(function() {
          if($(this).find(":focus").length == 0) {
            $(this).removeClass("jqhover");
          }
        });
      }
    });
}

function navbar_event() {
  if($(window).width() > 480) {
    $(".search-toggle").attr("tabIndex", "0");
    $(".menu-toggle").attr("tabIndex", "0");
    targetize_navbar(".menu-bar, .footer-links");
  } else {
    $(".menu-bar").find("a").attr("tabIndex", "-1");
    $(".search-toggle").attr("tabIndex", "2");
    $(".menu-toggle").attr("tabIndex", "3");

    $(".menu-toggle").focus(function() {
      if($(this).hasClass("active")) {
        $(this).on('keydown', function(e) {
          if(!(!e) && e.keyCode === 13) { // Enter key
            $(".menu-bar").find("a").each(function() {
              $(this).attr("tabIndex", "-1");
            });
          }
        });
      } else {
        $(this).on('keydown', function(e) {
          if(!(!e) && e.keyCode === 13) { // Enter key
            $(".menu-bar").find("a").each(function() {
              $(this).attr("tabIndex", "0");
            });
          }
        });
      }
    }).blur(function() {
      element.off('keydown');
    });
  }
}

$(function() {
  $(window).on("load", function() {
    console.debug("loaded");

    // 忍者おまとめボタン
    $(".ninja_onebutton_output_responsive").children().each(function() {
      targetize($(this));
    });

    // archives
    $(".year-opener").each(function() {
      targetize($(this));
    });

    // navigation toggle
    targetize($(".menu-toggle"));

    // search toggle
    targetize($(".search-toggle"));

    navbar_event();

    var timer = false;
    $(window).resize(function() {
      if (timer !== false) {
        clearTimeout(timer);
      }
      timer = setTimeout(navbar_event, 200);
    });
  }); // end of on 'load''
});

