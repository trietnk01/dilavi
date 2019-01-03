
!function(t,e,i,n){"use strict";t.fn.simpleLightbox=function(n){n=t.extend({sourceAttr:"href",overlay:!0,spinner:!0,nav:!0,navText:["&lsaquo;","&rsaquo;"],captions:!0,captionDelay:0,captionSelector:"img",captionType:"attr",captionsData:"title",captionPosition:"bottom",captionClass:"",close:!0,closeText:"×",swipeClose:!0,showCounter:!0,fileExt:"png|jpg|jpeg|gif",animationSlide:!0,animationSpeed:250,preloading:!0,enableKeyboard:!0,loop:!0,rel:!1,docClose:!0,swipeTolerance:50,className:"simple-lightbox",widthRatio:.8,heightRatio:.9,disableRightClick:!1,disableScroll:!0,alertError:!0,alertErrorMessage:"Image not found, next image will be loaded",additionalHtml:!1,history:!0},n),e.navigator.pointerEnabled||e.navigator.msPointerEnabled;var a,o,s=0,l=0,r=t(),c=function(){var t=i.body||i.documentElement;return""===(t=t.style).WebkitTransition?"-webkit-":""===t.MozTransition?"-moz-":""===t.OTransition?"-o-":""===t.transition&&""},d=!1,p=[],h=n.rel&&!1!==n.rel?(o=n.rel,t(this).filter(function(){return t(this).attr("rel")===o})):this,g=(c=c(),0),u=!1!==c,f="pushState"in history,m=!1,v=e.location,x=function(){return v.hash.substring(1)},b=x(),y=function(){x();var t="pid="+(q+1),e=v.href.split("#")[0]+"#"+t;f?history[m?"replaceState":"pushState"]("",i.title,e):m?v.replace(e):v.hash=t,m=!0},w="simplelb",E=t("<div>").addClass("sl-overlay"),C=t("<button>").addClass("sl-close").html(n.closeText),T=t("<div>").addClass("sl-spinner").html("<div></div>"),S=t("<div>").addClass("sl-navigation").html('<button class="sl-prev">'+n.navText[0]+'</button><button class="sl-next">'+n.navText[1]+"</button>"),k=t("<div>").addClass("sl-counter").html('<span class="sl-current"></span>/<span class="sl-total"></span>'),I=!1,q=0,D=t("<div>").addClass("sl-caption "+n.captionClass+" pos-"+n.captionPosition),M=t("<div>").addClass("sl-image"),A=t("<div>").addClass("sl-wrapper").addClass(n.className),R=function(e){e.trigger(t.Event("show.simplelightbox")),n.disableScroll&&(g=Y("hide")),A.appendTo("body"),M.appendTo(A),n.overlay&&E.appendTo(t("body")),I=!0,q=h.index(e),r=t("<img/>").hide().attr("src",e.attr(n.sourceAttr)),-1==p.indexOf(e.attr(n.sourceAttr))&&p.push(e.attr(n.sourceAttr)),M.html("").attr("style",""),r.appendTo(M),L(),E.fadeIn("fast"),t(".sl-close").fadeIn("fast"),T.show(),S.fadeIn("fast"),t(".sl-wrapper .sl-counter .sl-current").text(q+1),k.fadeIn("fast"),O(),n.preloading&&W(),setTimeout(function(){e.trigger(t.Event("shown.simplelightbox"))},n.animationSpeed)},O=function(i){if(r.length){var o=new Image,s=t(e).width()*n.widthRatio,l=t(e).height()*n.heightRatio;o.src=r.attr("src"),t(o).on("error",function(e){h.eq(q).trigger(t.Event("error.simplelightbox")),I=!1,d=!0,T.hide(),n.alertError&&alert(n.alertErrorMessage),X(1==i||-1==i?i:1)}),o.onload=function(){void 0!==i&&h.eq(q).trigger(t.Event("changed.simplelightbox")).trigger(t.Event((1===i?"nextDone":"prevDone")+".simplelightbox")),n.history&&(m?a=setTimeout(y,800):y()),-1==p.indexOf(r.attr("src"))&&p.push(r.attr("src"));var c=o.width,f=o.height;if(c>s||f>l){var v=c/f>s/l?c/s:f/l;c/=v,f/=v}t(".sl-image").css({top:(t(e).height()-f)/2+"px",left:(t(e).width()-c-g)/2+"px"}),T.hide(),r.css({width:c+"px",height:f+"px"}).fadeIn("fast"),d=!0;var x,b="self"==n.captionSelector?h.eq(q):h.eq(q).find(n.captionSelector);if(x="data"==n.captionType?b.data(n.captionsData):"text"==n.captionType?b.html():b.prop(n.captionsData),n.loop||(0===q&&t(".sl-prev").hide(),q>=h.length-1&&t(".sl-next").hide(),q>0&&t(".sl-prev").show(),q<h.length-1&&t(".sl-next").show()),1==h.length&&t(".sl-prev, .sl-next").hide(),1==i||-1==i){var w={opacity:1};n.animationSlide&&(u?(z(0,100*i+"px"),setTimeout(function(){z(n.animationSpeed/1e3,"0px")},50)):w.left=parseInt(t(".sl-image").css("left"))+100*i+"px"),t(".sl-image").animate(w,n.animationSpeed,function(){I=!1,P(x)})}else I=!1,P(x);n.additionalHtml&&0===t(".sl-additional-html").length&&t("<div>").html(n.additionalHtml).addClass("sl-additional-html").appendTo(t(".sl-image"))}}},P=function(e){""!==e&&void 0!==e&&n.captions&&D.html(e).hide().appendTo(t(".sl-image")).delay(n.captionDelay).fadeIn("fast")},z=function(e,i){var n={};n[c+"transform"]="translateX("+i+")",n[c+"transition"]=c+"transform "+e+"s linear",t(".sl-image").css(n)},L=function(){t(e).on("resize."+w,O),t(i).on("click."+w+" touchstart."+w,".sl-close",function(t){t.preventDefault(),d&&N()}),n.history&&setTimeout(function(){t(e).on("hashchange."+w,function(){d&&x()===b&&N()})},40),S.on("click."+w,"button",function(e){e.preventDefault(),s=0,X(t(this).hasClass("sl-next")?1:-1)});var a=0,o=0,r=0,c=0,p=!1,g=0;M.on("touchstart."+w+" mousedown."+w,function(t){return!!p||(u&&(g=parseInt(M.css("left"))),p=!0,s=0,l=0,a=t.originalEvent.pageX||t.originalEvent.touches[0].pageX,r=t.originalEvent.pageY||t.originalEvent.touches[0].pageY,!1)}).on("touchmove."+w+" mousemove."+w+" pointermove MSPointerMove",function(t){if(!p)return!0;t.preventDefault(),o=t.originalEvent.pageX||t.originalEvent.touches[0].pageX,c=t.originalEvent.pageY||t.originalEvent.touches[0].pageY,s=a-o,l=r-c,n.animationSlide&&(u?z(0,-s+"px"):M.css("left",g-s+"px"))}).on("touchend."+w+" mouseup."+w+" touchcancel."+w+" mouseleave."+w+" pointerup pointercancel MSPointerUp MSPointerCancel",function(t){if(p){p=!1;var e=!0;n.loop||(0===q&&s<0&&(e=!1),q>=h.length-1&&s>0&&(e=!1)),Math.abs(s)>n.swipeTolerance&&e?X(s>0?1:-1):n.animationSlide&&(u?z(n.animationSpeed/1e3,"0px"):M.animate({left:g+"px"},n.animationSpeed/2)),n.swipeClose&&Math.abs(l)>50&&Math.abs(s)<n.swipeTolerance&&N()}})},W=function(){var e=q+1<0?h.length-1:q+1>=h.length-1?0:q+1,i=q-1<0?h.length-1:q-1>=h.length-1?0:q-1;t("<img />").attr("src",h.eq(e).attr(n.sourceAttr)).on("load",function(){-1==p.indexOf(t(this).attr("src"))&&p.push(t(this).attr("src")),h.eq(q).trigger(t.Event("nextImageLoaded.simplelightbox"))}),t("<img />").attr("src",h.eq(i).attr(n.sourceAttr)).on("load",function(){-1==p.indexOf(t(this).attr("src"))&&p.push(t(this).attr("src")),h.eq(q).trigger(t.Event("prevImageLoaded.simplelightbox"))})},X=function(e){h.eq(q).trigger(t.Event("change.simplelightbox")).trigger(t.Event((1===e?"next":"prev")+".simplelightbox"));var i=q+e;if(!(I||(i<0||i>=h.length)&&!1===n.loop)){q=i<0?h.length-1:i>h.length-1?0:i,t(".sl-wrapper .sl-counter .sl-current").text(q+1);var a={opacity:0};n.animationSlide&&(u?z(n.animationSpeed/1e3,-100*e-s+"px"):a.left=parseInt(t(".sl-image").css("left"))+-100*e+"px"),t(".sl-image").animate(a,n.animationSpeed,function(){setTimeout(function(){var i=h.eq(q);r.attr("src",i.attr(n.sourceAttr)),-1==p.indexOf(i.attr(n.sourceAttr))&&T.show(),t(".sl-caption").remove(),O(e),n.preloading&&W()},100)})}},N=function(){if(!I){var o=h.eq(q),s=!1;o.trigger(t.Event("close.simplelightbox")),n.history&&(f?history.pushState("",i.title,v.pathname+v.search):v.hash="",clearTimeout(a)),t(".sl-image img, .sl-overlay, .sl-close, .sl-navigation, .sl-image .sl-caption, .sl-counter").fadeOut("fast",function(){n.disableScroll&&Y("show"),t(".sl-wrapper, .sl-overlay").remove(),S.off("click","button"),t(i).off("click."+w,".sl-close"),t(e).off("resize."+w),t(e).off("hashchange."+w),s||o.trigger(t.Event("closed.simplelightbox")),s=!0}),r=t(),d=!1,I=!1}},Y=function(n){var a=0;if("hide"==n){var o=e.innerWidth;if(!o){var s=i.documentElement.getBoundingClientRect();o=s.right-Math.abs(s.left)}if(i.body.clientWidth<o){var l=i.createElement("div"),r=parseInt(t("body").css("padding-right"),10);l.className="sl-scrollbar-measure",t("body").append(l),a=l.offsetWidth-l.clientWidth,t(i.body)[0].removeChild(l),t("body").data("padding",r),a>0&&t("body").addClass("hidden-scroll").css({"padding-right":r+a})}}else t("body").removeClass("hidden-scroll").css({"padding-right":t("body").data("padding")});return a};return n.close&&C.appendTo(A),n.showCounter&&h.length>1&&(k.appendTo(A),k.find(".sl-total").text(h.length)),n.nav&&S.appendTo(A),n.spinner&&T.appendTo(A),h.on("click."+w,function(e){if(function(e){if(!n.fileExt)return!0;var i=t(e).attr(n.sourceAttr).match(/\.([0-9a-z]+)(?=[?#])|(\.)(?:[\w]+)$/gim);return i&&"a"==t(e).prop("tagName").toLowerCase()&&new RegExp(".("+n.fileExt+")$","i").test(i)}(this)){if(e.preventDefault(),I)return!1;R(t(this))}}),t(i).on("click."+w+" touchstart."+w,function(e){d&&n.docClose&&0===t(e.target).closest(".sl-image").length&&0===t(e.target).closest(".sl-navigation").length&&N()}),n.disableRightClick&&t(i).on("contextmenu",".sl-image img",function(t){return!1}),n.enableKeyboard&&t(i).on("keyup."+w,function(t){if(s=0,d){t.preventDefault();var e=t.keyCode;27==e&&N(),37!=e&&39!=t.keyCode||X(39==t.keyCode?1:-1)}}),this.open=function(e){e=e||t(this[0]),R(e)},this.next=function(){X(1)},this.prev=function(){X(-1)},this.close=function(){N()},this.destroy=function(){t(i).off("click."+w).off("keyup."+w),N(),t(".sl-overlay, .sl-wrapper").remove(),this.off("click")},this.refresh=function(){this.destroy(),t(this).simpleLightbox(n)},this}}(jQuery,window,document);