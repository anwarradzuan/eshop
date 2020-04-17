/**
App Js
*/

(function(){
	if($){
		$.app = {
			item: {
				getItemPrice: function(){
					var t = $(".item-total");
					
					if(t !== undefined){
						var price = t.attr("data-price");
						
						return $.app.currency.getPrice(price);
					}else{
						return 0;
					}
				},
				getItemQuantity: function(){
					var t = $(".item-quantity");
					
					if(t !== undefined){		
						return t.val();
					}else{
						return 0;
					}
				},
				getItemTotal: function(){
					return (this.getItemPrice() * this.getItemQuantity());
				},
				updateView: function(){
					$(".item-total").html(this.getItemTotal());
				},
				listCost: function(){
					var x = [];
					
					$(".add-price").each(function(){
						switch($(this).nodeName){
							case "SELECT":
								x.push({
									name: $(this).prop("name"),
									value: $(this).prop("data-price")
								});
							break;
							
							case "INPUT":
								switch($(this).prop("attr")){
									case "radio":
									case "checkbox":
										if($(this).is("checked")){
											x.push({
												name: $(this).prop("name"),
												value: $(this).prop("data-price")
											});
										}
									break;
								}
							break;
						}
					});
					
					return x;
				}
			},
			items: {
				getList: function(){
					
				},
				getTotalQuantity: function(){
					
				},
				getTotal: function(){
					
				},
				updateView: function(){
					
				}
			},
			currency: {
				getPrice : function(x = 0){
					return x * this.getRate();
				},
				getCode: function(){
					return "MYR";
				},
				getSign: function(){
					return "RM";
				},
				getRate: function(){
					return 1.2;
				}
			}
		};
	}else{
		console.log("JQuery Is Not Installed");
	}
})();