<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BookL0V3: Đăng nhập - Đăng ký</title>

    <!-- Bootstrap -->
    <link href="public/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="public/assets/css/myCss.css">

    <!-- Custom Theme Style -->
    <link href="public/assets/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="logIn" method="post" action="index.php?c=login&a=signIn">
              <h1>Đăng nhập tài khoản</h1>
              <div>
                <input type="text" class="form-control required" placeholder="Tên tài khoản" name="txtUser" autocomplete="off" />
              </div>
              <div>
                <input type="password" class="form-control required" placeholder="Mật khẩu" name="txtPassword" />
              </div>
              <div>
                <button class="btn btn-primary submit" type="submit"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Đăng nhập</button>
                <a class="reset_pass" href="#">Bạn quên mật khẩu?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Bạn mới vào lần đầu?
                  <a href="#signup" class="to_register"> Tạo tài khoản </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <a href="index.php"><h1><i class="fa fa-book"></i> BookL0V3!</h1></a>
                  <p>Copyright &copy; 2018 - 2020. Đại học Bách Khoa Hà Nội</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="signUp" method="post" action="index.php?c=login&a=signUp">
              <h1>Tạo tài khoản</h1>
              <div>
                <input type="text" class="form-control required" placeholder="Tên tài khoản" name="txtUser1" id="txtUser1" />
              </div>
              <div>
                <input type="password" class="form-control required" placeholder="Mật khẩu" name="txtPassword1" id="txtPassword1" />
              </div>
              <div>
                <input type="password" class="form-control required" placeholder="Nhập lại mật khẩu" name="cpassword1" id="cpassword1" />
              </div>
              <div>
                <input type="text" class="form-control required" placeholder="Họ đệm" name="txtLastName" />
              </div>
              <div>
                <input type="text" class="form-control required" placeholder="Tên" name="txtFirstName" />
              </div>
              <div>
                <select name="txtGender" class="form-control mg">
                  <option value="0">Giới tính nữ</option>
                  <option value="1">Giới tính nam</option>
                  <option value="2">Giới tính khác</option>
                </select>
              </div>
              <div>
                <input type="text" class="form-control" name="txtBirthDay" placeholder="Ngày sinh" id="birthDay">
              </div>
              <div>
                <input type="email" class="form-control required" placeholder="Email" name="txtEmail" />
              </div>
              <div>
                <input type="text" class="form-control required" placeholder="Số điện thoại" name="txtPhone" />
              </div>
              <div>
                <input type="text" class="form-control required" placeholder="Địa chỉ" name="txtAddress" />
              </div>
              <div>
                <textarea rows="3" class="form-control mg" placeholder="Ghi chú" name="txtNote"></textarea>
              </div>
              <div>
                <input type="hidden" name="submit">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Tạo tài khoản</button>
              </div>
              

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Bạn đã là thành viên?
                  <a href="#signin" class="to_register"> Đăng nhập </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <a href="index.php"><h1><i class="fa fa-book"></i> BookL0V3!</h1></a>
                  <p>Copyright &copy; 2014 - 2018. Đại học Nguyễn Tất Thành</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="public/assets/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="public/assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="public/assets/js/bootstrap-datepicker.vi.js"></script>
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap-datepicker.min.css">

    <script type="text/javascript" src="public/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="public/assets/js/messages_vi.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#signUp").validate({

          rules: {
          cpassword1: {
            equalTo: "#txtPassword1"
          }
        }
        });
        $("#logIn").validate();
      });
    </script>
    <script>
      $(document).ready(function(){
        $.fn.datepicker.defaults.language = 'vi';
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        var date_input=$('input[name="txtBirthDay"]');
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
          format: 'dd/mm/yyyy',
          container: container,
          todayHighlight: true,
          autoclose: true,
        })
      })
    </script>
    
  </body>
</html>