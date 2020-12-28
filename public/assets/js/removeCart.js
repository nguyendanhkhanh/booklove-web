$(document).ready(function() {
	//Chạy khi page bắt đầu
    var total = 0;
    var bookCost;
    var quality;
    var bookID;

    calTotalItem();
    
    //Tính tổng tiền của tất cả sản phẩm trong giỏ hàng
	$(".quality").each(function(){
        var bookCost = parseInt($(this).parentsUntil('.panel-b').find('.bookCost').attr('value'));
        var quality = $(this).val();
        if(quality == 0)
        {
            quality = $(this).attr('value');
            $(this).val(quality);
        }
        total = total + (quality * bookCost);

    });
    //Xuất tổng tiền
    $('.total').text(total + "đ");
    $('#payCart').attr('href','index.php?c=carts&a=pay&total=' + total);

    //Xoá sản phẩm trong giỏ hàng
	$(".remove").click(function() {
		bookCost = parseInt($(this).parentsUntil('.panel-b').find('.bookCost').attr('value'));
        quality = $(this).parentsUntil('.panel-b').find('.quality').val();
        bookID = $(this).attr('bookID');
        $(this).parentsUntil('.panel-b').fadeOut(1000,function() { $(this).remove(); });

        total = (total - (bookCost * quality));

            $('.total').text(total + "đ");
            $('#payCart').attr('href','index.php?c=carts&a=pay&total=' + total);

        var bookID = $(this).attr('bookID');

        $.ajax({
            url: 'index.php?c=carts&a=removeItem',
            dataType:'json',
            data: {
                id: bookID
            },
            type: "POST"
        });
	});
	
	//Hàm cập nhật giá theo số lượng
	$( ".quality" ).change(function() {
        calTotalItem();
    });

    function calTotalItem() {
        total = 0;

        $(".quality").each(function(){
            bookCost = parseInt($(this).parentsUntil('.panel-b').find('.bookCost').attr('value'));
            quality = $(this).val();
            if(quality  < 0)
            {
                $(this).val('1');
                quality=1;
            }
            bookID = $(this).parentsUntil('.panel-b').find('.remove').attr('bookID');
            if(quality == 0)
            {
                quality = $(this).attr('value');
                $(this).val(quality);
            }
            total = total + (quality * bookCost);
            var t = quality * bookCost;
            $(this).parent().parent().find('.totalItem').text(t + "đ");
            $.ajax({
                url: 'index.php?c=carts&a=updateCart',
                dataType:'json',
                data: {
                    id: bookID,
                    quality: quality
                },
                type: "POST"
            });
        });
            $('.total').text(total + "đ");
            $('#payCart').attr('href','index.php?c=carts&a=pay&total=' + total);
    }
});