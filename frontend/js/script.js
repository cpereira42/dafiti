$(document).ready(function() {

    var pathname = window.location.pathname;
		pathname = pathname.split('/');
    console.log(pathname)
    if (pathname[1] == "add_item.html")
    {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/category",
            contentType:"application/json; charset=utf-8",
            dataType:"json",
            success: function (data) {
                for (i=0 ; i<= Object.keys(data).length; i++)
                {
                    $('#category_list').append("<option value="+data[i].id+">"+data[i].name+"</option>")
                }
            }
        });
    }

    if (pathname[1] == "item.html")
    {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/category",
            contentType:"application/json; charset=utf-8",
            dataType:"json",
            success: function (data) {
                get_list_item(data[0].id);
                for (i=0 ; i<= Object.keys(data).length; i++)
                {
                    $('#category_list').append("<option value="+data[i].id+">"+data[i].name+"</option>")
                }
                
            }
        });

        $('#category_list').change(function() {
            get_list_item($('#category_list').val());
        });
        $('#item_list').change(function() {
            get_info_item($('#item_list').val());
        });
    }

    
    $('#index').click(function() {
        window.open("http://localhost:8081/index.html","_self");
    });

    $('#edit_item').click(function() {
        window.open("http://localhost:8081/item.html","_self");
    });

    $('#insert_category').click(function() {
        window.open("http://localhost:8081/add_category.html","_self");
    });

    $('#insert_item').click(function() {
        window.open("http://localhost:8081/add_item.html","_self");
    });

    $('#sign_in').click(function() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/authe",
            data: {email:$('#email').val(), password:$('#password').val()},
            contentType:"application/json; charset=utf-8",
            dataType:"json",
            success: function (data) {
                alert(data.email);
                alert(data.password);
            }
        });
    });

    $('#add_category').click(function() {
        data = {name: $('#name_category').val()};
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/category",
            data: JSON.stringify(data),
            contentType:"application/json; charset=utf-8",
            dataType:"json",
            success: function (data) {
                alert("Cadastrado com sucesso!!");
            }
        });
    });
    

    $('#add_item').click(function() {
        data = {
                name: $('#name_item').val(),
                category : $('#category_list').val(),
                qtt : $('#qtt').val(),
                size : $('#size').val(),
                color : $('#color').val()
                };
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/item",
            data: JSON.stringify(data),
            contentType:"application/json; charset=utf-8",
            dataType:"json",
            success: function (data) {
                alert("Adicionado com sucesso!!");
            }
        });
    });

    $('#save_item').click(function() {
        data = {
                name: $('#name_category').val(),
                category : $('#category_list').val(),
                qtt : $('#qtt').val(),
                size : $('#size').val(),
                name : $('#name_item').val(),
                color : $('#color').val()
                };
        $.ajax({
            type: "PUT",
            url: "http://localhost:8080/item/"+$('#item_list').val(),
            data: JSON.stringify(data),
            contentType:"application/json; charset=utf-8",
            dataType:"json",
            success: function () {
                alert("Atualizado com sucesso!!");
            }
        });
    });

    $('#delete_item').click(function() {

        if (window.confirm("Deseja realmente excluir?")) 
        {
            data = {
                id: $('#item_list').val(),
                };
            $.ajax({
                type: "DELETE",
                url: "http://localhost:8080/item/"+$('#item_list').val(),
                data: JSON.stringify(data),
                contentType:"application/json; charset=utf-8",
                dataType:"json",
                success: function (data) {
                    alert("excluido com sucesso");
                    window.open("http://localhost:8081/index.html","_self");
                }
            });
        }
    });
});

function get_info_item(id)
{
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/item/info/"+id,
        contentType:"application/json; charset=utf-8",
        dataType:"json",
        success: function (data) {
            $('#name_item').val(data.name);
            $('#color').val(data.color);
            $('#qtt').val(data.qtt);
            $('#size').val(data.size);
        }
    });
}

function get_list_item(id)
{
    $('#item_list').empty();
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/item/"+id,
        contentType:"application/json; charset=utf-8",
        dataType:"json",
        success: function (data) {
            get_info_item(data[0].id);
            for (i=0 ; i<= Object.keys(data).length; i++)
            {
                $('#item_list').append("<option value="+data[i].id+">"+data[i].name+"</option>")
            }

        }
    });
}