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
                    console.log("Brand deleted!");
                }
            });

        console.log("Brand not deleted!");
    }

});