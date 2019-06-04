
	$(document).ready(function () {

		//delete

        $(".delete").click(function() {

          var ajax_id = $(this).attr('data-id');
          var row = $(this).closest('tr');

          var choice = confirm('Are you sure want to delete this page?', {'verify':true}, function(r)
          
          if(choice)
          {
              deleteAjax(ajax_id,row);
          }
          else
          {
              return false;
          }

        });

        function deleteAjax(id,row)
        {
            $.ajax({
                type: "POST",
                url: config.base_url + 'page/ajax_delete_page',
                dataType: 'text',
                data : {
                    page_id : id,
                },
                success : function(data) {
                    if(data=='1')
                    {                       
                        alert('The page has been deleted');
                    }
                    else if(data=='2')
                    {
                        alert('Error.');
                    }
                    else
                    {
                        alert('Error.');
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
                }
            });
        }

	});

		