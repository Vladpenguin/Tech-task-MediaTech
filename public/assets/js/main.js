/**
 * Created by snake on 26.10.16.
 */
$(document).ready(function(){
    $('#addUser').click(function(){
        $('#form_modal').modal('toggle');
    });

    $('#saveUser').click(function(){
        $.ajax({
            url: "/profile/tasks",
            type: "POST",
            dataType: "json",
            data: {
                title: $('#title').val(),
                descr: $('#descr').val(),
                user_id: $('#user_id').val(),
                _token: $('#token').val()
            },
            success: function(task){
                $('#addTask')[0].reset();
                $('#form_modal').modal('toggle');
                $('#tasksList').append('' +
                '<tr>' +
                    '<td>' + task.title + '</td>' +
                    '<td>' + task.description + '</td>' +
                    '<td>' + task.created_at + '</td>' +
                    '<td>' + task.updated_at + '</td>' +
                '</tr>');
            },
            error: function(){
                alert('error');
            }
        });
    });

    $('#change_pass').click(function(){
        $('#form_modal').modal('toggle');
    });

    $('#changePassword').click(function(){
        console.log($('#emailToSend').val());
        $.ajax({
            url: "/change-password",
            type: "PATCH",
            data: {
                email: $('#emailToSend').val(),
                _token: $('#token').val()
            },
            success: function(resp){
                if(resp == '1'){
                    $.amaran({
                        content:{
                            title: "Смена пароля",
                            message:'Вам на почту отправлен новый пароль',
                            icon:'fa fa-check',
                            info: $('#emailToSend').val()
                        },
                        theme:'awesome ok'
                    });
                } else{
                    $.amaran({
                        content:{
                            title: "Смена пароля",
                            message:'Пользователь с такой почтой не зарегистрирован',
                            icon:'fa fa-times',
                            info: $('#emailToSend').val()
                        },
                        theme:'awesome error'
                    });
                }

                $('#changeEmail')[0].reset();
                $('#form_modal').modal('toggle');
            },
            error: function(){
                alert('error');
            }
        });
    });
});