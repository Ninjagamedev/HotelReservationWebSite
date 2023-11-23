$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
  var x=1;
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){
    x=0;
	var first = $(this).parents('tr').find('td:first-child').text();

          $(this).parents("tr").find("td:not(:last-child):not(:first-child)").each(function(){
          x++;
					if(x == 4)
					{
						if($(this).text() == "Não")
						{
								$(this).html('<input type="number"  name="'+ x +'" class="form-control" min="0" max="1" value="0">');
						}else{
							$(this).html('<input type="number"  name="'+ x +'" class="form-control" min="0" max="1" value="1">');
						}
					}else{
									$(this).html('<input type="text"  name="'+ x +'" class="form-control" value="' + $(this).text() + '">');
					}


		});
		$(this).parents("tr").find("td:first-child").html('<input type="text" style="text-align:center;" name="ID" class="form-control transparente" value="' + first + '" readonly>');

		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
