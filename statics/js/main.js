$(document).ready(
		function() {
			document.addEventListener("touchstart", function() {
			}, true);
			// 数量增加操作
			$('.e-cartnum').each(function() {
				var plus = $(this).find('.e-addnum'), loss = $(this).find('.e-reducenum'), num = $(this).find('.e-cartqty'), i = 1;
				plus.on('click', function() {
					i++
					num.text(i);
				})
				loss.on('click', function() {
					i--
					if (i <= 1)
						i = 1;
					num.text(i);
				});
			});
			// 选择框选中替换效果
			$(".e-bz-slt select").each(function() {
				var j_sltOpt = $(this).find("option:selected").text();
				$(this).prev().html(j_sltOpt);
			});
			$(".e-bz-slt select").change(function() {
				j_sltOptAfter = $(this).find("option:selected").text();
				$(this).prev().html(j_sltOptAfter);
			});

			// 手风琴效果
			var oAccordionOne = $(".e-accordion ul li h3");
			$(".e-accordion ul li ul").hide();
			oAccordionOne.click(function() {
				$(this).find("i").toggleClass("ico-reduce");
				$(this).parent().find("ul").slideToggle(200);
				$(this).parent().siblings().find("ul").slideUp(200);
				$(this).parent().siblings().find("i").removeClass("ico-reduce");
			});
			// 选择支付方式
			var aPayKind = $('.e-order-pay ul li');
			aPayKind.each(function() {
				$(this).click(function() {
					$(this).parent().find('li').removeClass('active');
					$(this).addClass('active');
				});
			});
			// 收藏显示效果
			$(".e-fav-pop").hide();
			$(".e-fav-btn").click(function() {
				$(".e-fav-pop").show(300).delay(1000).hide(300);
			});

			// tab页面鼠标点击切换
			$('.e-low').hide();
			$('.e-low').eq(0).show();
			$('.e-tab li').eq(0).addClass('active');
			$('.e-tab li').on('click', function() {
				$('.e-tab li').removeClass('active');
				$(this).addClass('active');
				$('.e-low').hide();
				$('.e-low').eq($('.e-tab li').index(this)).show();
			});

			// 公共popup效果
			$('.e-pop').hide();
			$('.e-pop-btn').click(
					function(shirtName, shirtNumber) {
						var shirtName = $('.e-shirt-english').val(), shirtNumber = $('.e-shirt-number').val(), teamCode = $("#teamCode").val();
						shirtTd = "http://images.fanatics.com/lf?set=key[name],value[" + shirtName + "]&set=key[number],value[" + shirtNumber + "]&call=url[http://dmimages.ff.p10/chains/" + teamCode
								+ ".txt]&scale=size[400]&sink";
						popShow("popMsg");
						$('.e-team-jersey').attr('src', shirtTd);
					});

			function popHide() {
				$('.e-pop').hide();
			}
			$('.e-pop-cancel').click(function() {
				popHide();
			});
			$('.e-pop-confirm').click(function() {
				popHide();
			});

			$('.e-cnav').on('click', function() {
				if ($('.e-content').hasClass('bz-section-left')) {
					$('.e-content').removeClass('bz-section-left');
				} else {
					$('.e-content').addClass('bz-section-left');
				}
				;
			});

			$('.e-custom-close').click(function() {
				$('.e-custom-guide').fadeOut(200);
			})
			$('.e-custom-attention').click(function() {
				$('.e-custom-guide').fadeIn(200);
			});
			$('.e-custom-rotate').click(function() {
				$('.e-custom-control ul li:first-child').toggle();
				$('.e-custom-control ul li:last-child').toggle();
			});
			$('.e-custom-rotate').click(function() {
				var sCustomNUm = $('.e-custom-num').val();
				$('.e-custom-num-front').text(sCustomNUm);
			});

			// 尺码选择
			$('.e-custom-size ul li').click(function() {
				$('.e-custom-size ul li').removeClass();
				$(this).addClass('active')
				$("#invQty").text($(this).attr("data-invQty"));
			});

			// 浮动导航效果
			$('.e-nav-btn').click(function() {
				var bodyHeight = $('body').height();// 获取当前窗口高度
				$('.e-nav-menu').slideToggle(100);
				$('.e-nav-mask').css('height', bodyHeight).fadeToggle(100);
			});
			$('.e-nav-mask').click(function() {
				$('.e-nav-menu').slideUp(100);
				$(this).fadeOut(100);
			});
			$('.e-nav-clear').click(function() {
				$('.e-nav-search').val('');
			});

			// 选择球队
			$(".e-change-style li").click(function() {
				$(this).addClass('active').siblings().removeClass('active');
			});
			$('.e-cmas-size ul li').click(function() {
				$(this).addClass('active');
				$(this).siblings().removeClass('active');
			});

			// 选择框模拟效果
			function sltControl() {
				$(".e-slt-cmscontrol select").each(function() {
					var oSltOpt = $(this).find("option:selected").text();
					$(this).siblings('input').val(oSltOpt);
				});
				$(".e-slt-cmscontrol select").change(function() {
					var oSltOpt = $(this).find("option:selected").text();
					$(this).siblings('input').val(oSltOpt);
				});
			}
			;
			sltControl();

			// Christmas begin
			var cmasFun = function(cmasB1, cmasC1, cmasB2, cmasC2, cmasB3, cmasC3) {
				$(cmasB1).click(function() {
					$(this).hide();
					$(cmasB2).show();
					$(cmasC1).hide();
					$(cmasC2).fadeIn(600);
				});
				$(cmasB2).click(function() {
					$(this).hide();
					$(cmasB3).show();
					$(cmasC2).hide();
					$(cmasC3).fadeIn(500);
				});
			};
			cmasFun('.e-cmas-sub1', '.e-cmas-logo', '.e-cmas-sub2', '.e-cmas-info', '.e-cmas-sub3', '.e-cmas-list');
			cmasFun('.e-cmas-sub4', '.e-cams-code', '', '.e-cmas-package');

			// photos' wall eff

//			$('.e-wall-list ul li div p').click(function() {
//				if ($('.e-wall-list ul li div').find('i').hasClass('active')) {
//				} else {
//					$(this).find('i.ico-wall-supprot').addClass('active')
//				}
//			})

			function summerColor(){
				$('.e-summer-enter ul li img.color').click(function(){
					$('.e-summer-enter ul li div.des').hide()
					$(this).siblings('div.des').show()
					})
				
				$('.e-summer-enter ul li i.close').click(function(){
					$('.e-summer-enter ul li div.des').hide()
					})
				$('.e-summercolor-rockets-btn').click(function(){
					$('.e-summercolor-bulls').hide()
					$('.e-summercolor-rockets').show()
					})
				$('.e-summercolor-bulls-btn').click(function(){
					$('.e-summercolor-rockets').hide()
					$('.e-summercolor-bulls').show()
					})
				}
				
			summerColor()

	function bargain() {
		$('.e-bargain-rule').click(function(event) {
			$('.e-bargain-rulecon').fadeIn(400);
			$('.e-png-mask').fadeIn(400);
		});
		$('.e-bargain-rulecon').find('span').click(function(event) {
			$('.e-bargain-rulecon').fadeOut(400);
			$('.e-png-mask').fadeOut(400);
		});
		$('.e-png-mask').click(function(event) {
			$('.e-bargain-rulecon').fadeOut(400);
			$('.e-png-mask').fadeOut(400);
		});
	}
	bargain();

	// 蒙牛页面弹窗样式
	function comPop(popUpBtn,popUpCon,popUpClose) {
		var windowH = $(window).height();
		$(popUpBtn).click(function(event) {
            var scrollHeight = $(document).scrollTop(); //获取当前窗口距离页面顶部高度
            var conHeight = $(popUpCon).outerHeight(); //获取弹出层高度
            var posiTop = (windowH - conHeight) / 2 + scrollHeight;
            $(popUpCon).css({
                "top": posiTop + "px"
            }).fadeIn(100);
            $('.e-popup-mask').show();                        			
		})
        $(popUpClose).click(function(event) {
            $(popUpCon).fadeOut(100)
            $('.e-popup-mask').hide();
        });	
        $('.e-popup-mask').click(function() {
            $(popUpCon).fadeOut(100)
            $(this).hide();
        });        	
	}
	comPop('.e-popup-btn','.e-mengniu-popup','.e-popup-close');
	comPop('.e-chiritmas-coupons','.e-popup-chiritmas-con','.e-popup-chritmas-close');
	//分享弹窗
	function Popeff(popUpBtn,popUpCon,popUpClose) {
		$(popUpBtn).click(function(event) {
            $(popUpCon).css({
                "top":0 + "px"
            }).fadeIn(100);
            $('.e-popup-mask').show();                        			
		})
        $(popUpClose).click(function(event) {
            $(popUpCon).fadeOut(100)
            $('.e-popup-mask').hide();
        });	
        $('.e-popup-mask').click(function() {
            $(popUpCon).fadeOut(100)
            $(this).hide();
        });        	
	}
	Popeff('.e-share-btn','.e-activity4-popup','.e-activity4-close');
	
	//单选效果
     $(".e-radio li").click(function(){
		 $(this).addClass("active")
		 $(this).siblings().removeClass("active")
		 $(this).parent().siblings().find("li").removeClass("active")
		 })
	//
	$(".e-gift-rule").click(function(){
		$(this).next("div.ui-gift-rulelist").slideDown(200);
		})
	$(".e-rule-back").click(function(){
		$(this).parent("div.ui-gift-rulelist").slideUp(200);
		})			 
})

function popShow(popId) {
	var scrollHeight = $(document).scrollTop();// 获取当前窗口距离页面顶部高度
	var windowHeight = $(window).height();// 获取当前窗口高度
	var bodyHeight = $('body').height();// 获取当前窗口高度
	var popupHeight = $('.ui-pop-con').height();// 获取弹出层高度
	var posiTop = (windowHeight - popupHeight) / 2 + scrollHeight;

	var $pop = $('#' + popId);
	$pop.find('.ui-pop-con').css({
		"top" : posiTop - 50 + "px"
	});// 设置position
	$pop.find('.ui-border-normal').css({
		"top" : scrollHeight + 50 + "px"
	});
	$pop.find('.e-pop-bg').css('height', bodyHeight);
	$pop.show();
}
