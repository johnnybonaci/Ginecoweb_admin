$( document ).ready(function() {
            
    $( ".delete" ).click(function() {        
        
        // tanya

        var choice = confirm("Are you sure to delete");

        if (choice) {
            
            // amik id from data-id

            var article_id = $(this).attr('data-id');

            deleteAjax(article_id);
        }
        else
        {
            return false;
        }

    });

    // delete ajax

    function deleteAjax(article_id)
    {
        $.ajax({
            type: "POST",
            url: config.base_url + 'article/ajax_delete_article',
            dataType: 'text',
            data : {
                article_id : article_id
            },
            success : function(data) {
                if(data=='1')
                {
                    alert('Deleted');
                    location.reload();
                }
                else if(data=='2')
                {
                    alert('Error');
                }
                else
                {
                    alert('Error');
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
            }
        });
    }

    

});