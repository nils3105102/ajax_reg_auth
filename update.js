$(document).ready(function(){
    $("#change_name").click(function(e){
        e.preventDefault();
        var name = $(this).text();
        $('#name').html('<input type="text" name="show" placeholder="Измените имя" id="in">' +
            '<button name="save" id="save">Save</button>');
        $('#save').click(function (e) {
            e.preventDefault();
            var newValue = $('#in').val();
            $("#name").html(newValue);
            //console.log(newValue);
            //var showNew = $('#name').text(newValue).val();

        //var name = document.getElementById();
            $.post("update.php",{
                show: newValue
            }, function(data) {
                if(data=='Вы изменили имя!'){
                    alert(data);
                }else {
                    alert(data);
                }
            });
        });
    });
});