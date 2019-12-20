$(document).ready(function() {
	$('.addCart').click(function(){
		var bookID = $(this).attr('bookID');
		$.ajax({
			url: 'index.php?c=carts&a=addCart',
            dataType:'json',
            data: {
                id: bookID
            },
            type: "POST",
            success: function() {
                alert("Thêm giỏ hàng thành công!");
            },
            error: function() {
            	alert("Sản phẩm đã có! Cập nhật số lượng thành công!");
            }
		});
	});
});