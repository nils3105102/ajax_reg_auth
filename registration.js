$(document).ready(function() {
    $("#register").click(function(e) {
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if (name == '' || email == '' || password == '' || cpassword == '') {
            alert("Заполните все поля!");
        } else if ((password.length) < 5) {
            alert("Длина пароля должна быть 5 или больше символов!");
        } else if (!(password).match(cpassword)) {
            alert("Пароли не совпадают. Попробуйте ещё!");
        } else {
            $.post("register.php", {
                name: name,
                email: email,
                password: password
            }, function(data) {
                if(data=='Вы успешно зарегистрировались!'){
                    $("#form")[0].reset();
                }
                alert(data);
            });
        }
    });
});