$(document).ready(function(){
	//购物车数量
	function numControl(){
		$(".e-cart-control").each(function(){
			var plus=$(this).find('span.add');
			var minus=$(this).find('span.reduce');
			var num=$(this).find('input.count');
			var i=1;

			plus.click(function(){
				i++;
				num.val(i);
				allTotal();
			})
			minus.click(function(){
				i--;
				if(i<0){
					i=0;
				}
				num.val(i)
				allTotal();
			})
		})
	}
	numControl();
	// checkall全选
	function checkAll(){
		$("#checkAll").change(function(){
			if($(this).is(":checked")){
				$(".check").attr('checked',true)
			}else{
				$(".check").attr('checked',false)
			}
		})
		//allTotal();
	}
	checkAll()
	//
	function subCheck(){
		$('.check').change(function(){
			//allTotal()
			var checkboxLength=$(".e-cart-chose :checkbox").length;
			var checkedLength=$(".e-cart-chose :checkbox:checked").length;
			if(checkedLength==checkboxLength){
				$('#checkAll').attr("checked",true)
			}else{
				$('#checkAll').attr("checked",false)
			}
		})
	}
	subCheck()
	function deletePro(){
		$('.e-delete').click(function(){
			$(this).parent().parent().fadeOut(function(){
				$(this).remove();
			})
			$(this).parent().siblings('div.miaoshu').find('input.count').val("0")
			$(this).parent().siblings('input.check').attr('checked',false);
		})
	}
	deletePro();
	//合计
function allTotal(){
	var total=0;
	$(".e-cart-chose :checkbox:checked").each(function(){
		var proNum=parseInt($(this).siblings('div.miaoshu').find('input.count').val())
		//alert(proNum)
		var price=parseFloat($(this).siblings('div.subprice').find('span.price').text())
		var subtotal=(proNum*price).toFixed(2);
		total+=parseFloat(subtotal);
	})
	$('#priceTotal').text(total.toFixed(2));
}
$('.e-cart-chose .check').bind('change',allTotal);
$('.e-cart-chose .reduce,.e-cart-chose .add').bind('change',allTotal)
$("#checkAll").bind('change',allTotal)
$('.e-cart-chose .e-delete').bind('click',allTotal)
})




//小计
// function subtotal(){
// 	var proNum=parseInt($('.e-cart-chose input.count').val());
// 	var price=parseFloat(proNum.parent().parent().siblings('div.subprice').find('span').text());
// 	var subtotal=(proNum*price).toFixed(2)
// }


