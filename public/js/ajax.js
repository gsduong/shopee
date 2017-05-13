$(".delete-brand").click(function(){
    var id = $(this).data("id");
    var token = $(this).data("token");
    var answer = confirm ("Are you sure you want to delete this brand?");
    if (answer)
    {
        $.ajax(
            {
                url: "/admin/brand/delete/"+id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function ()
                {
                    $('#brand-'+id).remove();
                    alert("Brand successfully deleted!");
                    console.log("Brand deleted!");
                }
            });

        console.log("Brand not deleted!");
    }

});

$(".edit-btn").click(function(){
    var id = $(this).data("id");
    var name = $(this).data("name");
    document.getElementById("name").value = name;
    document.getElementById("id").value = id;
});

$(".delete-subcategory").click(function () {
    var id = $(this).data("id");
    var token = $(this).data("token");
    var answer = confirm ("Are you sure you want to delete this subcategory?");
    if (answer)
    {
        $.ajax(
            {
                url: "/admin/catalog/delete/"+id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function ()
                {
                    $('#category-'+id).remove();
                    alert("Category successfully deleted!");
                    console.log("Category deleted!");
                }
            });
        
    }
});