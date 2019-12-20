$(document).ready(function() {

	//Xoá tài khoản
	$(".removeAccount").click(function() {
		var r = confirm("Bạn có chắc muốn xoá tài khoản này không?");
		if(r==true){
			var userName = $(this).attr('userName');
			var roleAccount = $(this).attr('roleAccount');
			if (roleAccount==0) {
				alert("Lỗi! Tài khoản này không thể xoá!");
			}
			else
			{
				$(this).parentsUntil('.panel-b').fadeOut(1000,function() { $(this).remove(); });
				$.ajax({
					url: "index.php?c=admin_edit_account&a=removeAccount",
					type: 'POST',
					dataType: 'json',
					data: {
						userName: userName
					}
				});
			}
		}
	});

	//Xoá dữ liệu
	$(".remove").click(function() {
		var r = confirm("Bạn có chắc muốn xoá dòng này không?");
		if(r==true){
			var idData = $(this).attr('idData');
			var url = $(this).attr('strUrl');
			$(this).parentsUntil('.panel-b').fadeOut(1000,function() { $(this).remove(); });
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
					idData: idData
				}
			});
		}
	});
});