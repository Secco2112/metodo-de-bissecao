var PATH = $("meta[name=application-path]").attr("content");

$(document).ready(function() {
	make_count();
	clear();
});


function make_count() {
	$("#bissecao-form").on("submit", function(e) {
		e.preventDefault();

		var math_function = $("#math-function").val(),
			interval = $("#interval").val(),
			absolute_error = $("#absolute-error").val(),
			decimal_places = $("#decimal-places").val() || 4;

			
		$.ajax({
			url: window.location.href + 'includes/ajax/calculates.php',
			type: 'post',
			dataType: 'json',
			data: ({
				math_function: math_function,
				interval: interval,
				absolute_error: absolute_error,
				decimal_places: decimal_places
			}),
			success: function(data) {
				if(data) {
					$(".table-wrapper .table tbody").empty();

					for(var i=0; i<data.a.length; i++) {
						var row = "<tr />";
						row += ('<td>' + data.n[i] + '</td>');
						row += ('<td>' + data.a[i] + '</td>');
						row += ('<td>' + data.b[i] + '</td>');
						row += ('<td>' + data.pm[i] + '</td>');
						row += ('<td>' + data.fx[i] + '</td>');
						row += ('<td>' + data.e[i] + '</td>');
						$(".table-wrapper .table tbody").append(row);
					}

					$(".table-wrapper").show();

					$(".result-wrapper").show();
					$(".result-data").html(data.pm[data.pm.length-1]);
				}
			}
		})
	});
}


function clear() {
	$("button[type=reset]").on("click", function(e) {
		$(".table-wrapper .table tbody").empty();
		$(".table-wrapper").hide();
		$(".result-wrapper").hide();
		$(".result-data").empty();
	});
}