$(document).ready(function(){
    $("#login").click(function(e){
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        if( email =='' || password ==''){
            alert("Заполните все поля!");
        }else {
            $.post("login.php",{
                    email: email,
                    password:password
                }, function(data) {
                    if(data=='Email и пароль неверные!'){
                        alert(data);
                    } else if(data=='Вы успешно вошли!'){
                        //$("form")[0].reset();
                        alert(data);
                        window.location.replace("home.php");
                    } else{
                        alert(data);
                    }
                });
        }
    });
});