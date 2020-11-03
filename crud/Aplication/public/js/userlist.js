$(document).ready(function(){
    $("#userTable").DataTable( {
        "pageLength": 10,
        "searching": false,
        "lengthChange": false
      });
});

function cancell(id){
   
        $.ajax({
            url: 'http://127.0.0.1:80/user/delete/'+id,
            type: "DELETE",
            data: {_token:$("input[name='_token']").val()},
            async: true,
            dataType: "Json",
            success: function(data) {
              if(data.sucesso == 1){
                alert(data.message);
                location.href = 'http://127.0.0.1:80/user/list';
              } else {
                alert(data.message);
              }
            }
        })
    
  }