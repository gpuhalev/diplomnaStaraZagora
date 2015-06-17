$(document).ready(function() {
	var menArray = ["100m", "200m", "400m", "800m", "1500m", "3000m", "5000m", "110m Hurdles", "400m Hurdles", "3000m Steeplechase", "4x400m", "4x100m", "High Jump", "Pole Vault", "Long Jump", "Triple Jump", "Shot Put", "Discus Throw", "Hammer Throw", "Javelin Throw"];
	var womenArray = ["100m", "200m", "400m", "800m", "1500m", "3000m", "5000m", "100m Hurdles", "400m Hurdles", "3000m Steeplechase", "4x400m", "4x100m", "High Jump", "Pole Vault", "Long Jump", "Triple Jump", "Shot Put", "Discus Throw", "Hammer Throw", "Javelin Throw"];

	$( "#gendSelect" ).change(function() {
		myGender = $( "#gendSelect option:selected" ).text();
		if (myGender == 'Men'){
			fillDropdown(menArray);
		}else if(myGender == 'Women'){
			fillDropdown(womenArray);
		}else{
			clearDropdown();
		}
	});

	$( "#eventSelect" ).change(function() {
		myEvent = $( "#eventSelect option:selected" ).text();
	});

	function fillDropdown(myArray){
		var myDropdown = $('#eventSelect');
		clearDropdown();
		$.each(myArray, function(index, value){
			myDropdown.append($('<option></option>').val(value).html(value));
		});
	}

	function clearDropdown(){
		$("#eventSelect option").each(function(){
		    if($(this).attr("class") != "select"){
		    	$(this).remove();
		    }
		});		
	}


	$("#sbmtBttn2").click(function(){
		event.preventDefault();
		if(myGender == "--SELECT--" || jQuery.type(myGender) === 'undefined'){
			alert("Please, select men/women");
		}else if(myEvent == "--SELECT--" || jQuery.type(myEvent) === 'undefined'){
			alert("Please, select event");
		}else{
			var linkAddress = './parser.php?myGender=' + encodeURIComponent(myGender) 
			+ '&myEvent=' + encodeURIComponent(myEvent);
			window.open(linkAddress, '_blank');
		}
	});
});