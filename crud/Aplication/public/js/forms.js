$(document).ready(function(){
    var base_url_api = 'http://127.0.0.1:8000/';
    var base_url = 'http://127.0.0.1:80/';
    $('#form_login').validate({
        rules: {
          password: 'required',
          login: {
            required: true,
            email: true,
          }
        },
        messages: {
          password: 'Senha é obrigatório.',
          login: {
              required: "E-mail obrigatório.",
              email: "E-mail inválido."
          }
        },
        submitHandler: function(form) {
          $.ajax({
            url: base_url_api+'api/auth/login',
            type: 'POST',
            data: $("#form_login").serializeArray(),
            async: true,
            dataType: "Json",
            success: function(data) {
                if( data.sucesso == 1 ) {
                  $.ajax({
                    url: base_url+'autenticar',
                    type: "POST",
                    data: {access_token: data.access_token, _token: $("input[name='_token']").val()},
                    async: true,
                    dataType: "Json",
                    success: function(data) {
                      if(data.status == 1){
                        location.href = base_url+'home';
                      } else {
                        alert(data.message);
                      }
                    }
                  })
                 // 
                } else {
                  alert(data.message)
                }
            }
        });
        }
      });


      $('#form_register').validate({
        rules: {
          name: {
            required: true
          },
          password: {
            required: true,
          },
          password_confirmation: {
              required: true,
              equalTo: "#password"
          },
          login: {
              required: true,
              email: true,
            }
          },
          messages: {
            name: "Nome é obrigatório.",
            password: 'Senha é obrigatório.',
            password_confirmation: {
                required: "Confirmar senha obrigatório.",
                equalTo: "Senhas não correspondem"
            },
            login: {
                required: "E-mail obrigatório.",
                email: "E-mail inválido."
            }
          },
          submitHandler: function(form) {
            $.ajax({
              url: base_url+'user/add',
              type: "POST",
              data: $("#form_register").serializeArray(),
              async: true,
              dataType: "Json",
              success: function(data) {
                if(data.sucesso == 1){
                  alert(data.message);
                  location.href = base_url;
                } else {
                  alert(data.message);
                }
              }
            })
          }
        });

        $('#form_edit').validate({
          rules: {
            name: {
              required: true
            },
            login: {
                required: true,
                email: true,
              }
            },
            messages: {
              name: "Nome é obrigatório.",
              login: {
                  required: "E-mail obrigatório.",
                  email: "E-mail inválido."
              }
            },
            submitHandler: function(form) {
              $.ajax({
                url: base_url+'user/edit/'+$("input[name='user_id']").val(),
                type: "POST",
                data: $("#form_edit").serializeArray(),
                async: true,
                dataType: "Json",
                success: function(data) {
                  if(data.sucesso == 1){
                    alert(data.message);
                    location.href = base_url+'user/list';
                  } else {
                    alert(data.message);
                  }
                }
              })
            }
          });

          
});



