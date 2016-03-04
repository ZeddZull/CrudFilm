window.onload=function(){
	var table = $("#lesFilms").DataTable();
	table.column(0).visible(false);
};

$('#add').click(function(){
	$('#addFilm').toggle();
});

$('#envoie').click(function(){
	var titreO = $('#titreOriginal').val();
	var titreF = $('#titreFrancais').val();	
	var couleur = $('#couleur').val();
	var pays = $('#pays').val();
	var date = $('#date').val();
	var duree = $('#duree').val();
	var real = $('#reals option:selected')
	$.ajax({
		type:'POST',
		url:'/ajouter',
		data: { titreO:titreO,
				titreF:titreF,
				couleur:couleur,
				pays:pays,
				date:date,
				duree:duree,
				real:real.val()
				} 
	}).done(function(codeFilm){
		$('#addFilm').toggle();

		var oModif = $("button");
		var oSuppr = $("button");

		oModif.attr("class","action");
		oModif.attr("value","Modifier");
		oSuppr.attr("class","action");
		oSuppr.attr("value","Supprimer");

		$("#lesFilms").DataTable().row.add([
			codeFilm,
			titreO,
			titreF,			
			pays,
			date,
			duree,	
			couleur,
			real.text(),	
			"Actualiser",
			"Actualiser"						
		]).draw();

	});
});

$(".action").click(function(){
	var codeFilm=$(this).attr("dataid");
	var valeur = $(this).attr("value");
	var oCases = $("#" + codeFilm + " td:not(:has(button))");

	if(valeur == "Modifier"){
		oCases.attr("contentEditable","true");
		$("#" + codeFilm).css("backgroundColor","#FAFC64");
		$(this).attr("value","Sauver");
		$("#" + codeFilm +" .btn-warning").attr("class","action btn btn-success btn-sm");
		var select = $("#reals").clone();
		select.attr("id","realModif"+codeFilm);
		oCases.eq(6).html(select);
		$("#realModif"+codeFilm+ 'option[value="'+oCases.eq(6).attr("dataid")+'"]').prop('selected',true);

	} else {
		if(valeur == "Sauver"){
			if(confirm("Voulez vous sauver ces modification ?")){
				$.ajax({
					method:"POST",
					url:"/modifier",
					data:{
						code:codeFilm,
						titreo:oCases.eq(0).text(),
						titref:oCases.eq(1).text(),
						pays:oCases.eq(2).text(),
						dates:oCases.eq(3).text(),
						duree:oCases.eq(4).text(),
						couleur:oCases.eq(5).text()
					}
				});
			}else{
				$.ajax({
					method:"GET",
					url:"/info/"+codeFilm,
					dataType:"json"
				}).done(function(film){
					oCases.eq(0).text(film.titre_original);
					oCases.eq(1).text(film.titre_francais);
					oCases.eq(2).text(film.pays);
					oCases.eq(3).text(film.dates);
					oCases.eq(4).text(film.duree);
					oCases.eq(5).text(film.couleur);
				});
			}
			$("#" + codeFilm + " td:not(:has(button))").attr("contentEditable","false");
			$(this).attr("value","Modifier");
			if ($("#" + codeFilm).hasClass("odd")){
				$("#" + codeFilm).css("backgroundColor","#EEEEEE");
			} else {
				$("#" + codeFilm).css("backgroundColor","#DDDDDD");
			}
			$("#" + codeFilm +" .btn-success").attr("class","action btn btn-warning btn-sm");
		} else {
			if (valeur == "Supprimer"){
				$.ajax({
					method:"GET",
					url:"/delete/"+codeFilm
				}).done(function(){
					$("#lesFilms").DataTable().row($("#" + codeFilm)).remove().draw();
				});
			}
		}
	}
});

$("#genres").change(function(){
	var codeGenre = $("#genres option:selected").attr("value");
	var table = $("#lesFilms").DataTable();
	$.fn.dataTable.ext.search.pop();
    table.draw();
	if (codeGenre>0){
		$.ajax({
			method:"GET",
			url:"/genres/"+codeGenre,
			dataType:"json"
		}).done(function(films){
			console.log(films);
			$.fn.dataTable.ext.search.push(function(settings, data, dataIndex){
	         	return $.inArray($(table.row(dataIndex).node()).attr('id'),films)>0;
	        });
		    table.draw();
		});
	}
});

// Petit test :)
var table = $('#lesFilms').DataTable();
 
$('#lesFilms tbody').on( 'click', 'tr', function () {
    console.log( table.row( this ).data() );
} );