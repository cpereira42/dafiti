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
                alert(data);
            }
        });
    });
    

    $('#add_item').click(function() {
        alert($('#name_category').val()+$('#category_list').val()+$('#qtt').val()+$('#size').val()+$('#color').val());
        data = {
                name: $('#name_category').val(),
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
                alert(data);
            }
        });
    });



    
});