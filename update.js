$(document).ready(function(){
    $("#change_name").click(function(e){
        e.preventDefault();
        var name = document.getElementById("myDiv");
            $.post("update.php",{
                name:name
            }, function(data) {
                if(data=='Email и пароль неверные!'){
                    alert(data);
                } else if(data=='Вы успешно вошли!'){
                    //$("form")[0].reset();
                    alert(data);
                    //window.location.replace("home.php");
                } else{
                    alert(data);
                }
            });

    });
});