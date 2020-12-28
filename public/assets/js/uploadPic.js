$(document).ready(function() {
	$("#submit").click(function(e) {
		e.preventDefault();
		//Sử dụng ajax post
		$("#frmIssue").ajaxSubmit({
			type: "POST",
			url: "index.php?c=admin_edit_author&a=picture",
			success: function(html){
				if(html.indexOf('_invalid_type') >= 0){
					alert("Kiểu dữ liệu không được phép!");
				}
				else if(html.indexOf('_invalid_size') >= 0){
					alert("Kích thước file không vượt quá 500MB");
				}
				else{
					$("#frmIssue").trigger('reset');
					$("#image-preview").attr('src', html);
					$("#txtPicture").attr('value', html);
				}
			}
		});

		$('#file').change(function(){
			if (this.files && this.files[0]) {
				//Lấy ra files
				var $_files = this.files[0];
				//lấy ra kiểu file
				var $_ext = $(this).val().substring($(this).val().lastIndexOf('.') + 1).toLowerCase();
				//XĂ©t kiá»ƒu file Ä‘Æ°á»£c upload
				var $_validFileExtensions= ["jpeg","png","jpg",'gif'];
				//kiá»ƒm tra kiá»ƒu file
				if($.inArray($_ext, $_validFileExtensions)==-1){
					alert('Invalid file type (jpg,png,gif) !');
				}else{
					var $_t = window.URL || window.webkitURL;	
					var $_objectURL = $_t.createObjectURL($_files);
					$('#image-preview').attr('src', $_objectURL);
					if ( window.FileReader ) {
						var reader = new FileReader();
						reader.onload = function (e) {
							console.log(e.target);
							$('#image-preview').attr('src', e.target.result);
						}
						reader.readAsDataURL(this.files[0]);
					}
				}
			}
		});

	});
});