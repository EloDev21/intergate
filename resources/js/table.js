var currentPage = 0;
//var PreviousRecherche;
var selectedTab = -1;

/*

*/
//

function getTabPSearch(page) {
	
	if(page == null || page < 1) {
		return;
	}

	currentPage = page;

	let fd1 = new FormData();
	
	let namePSrc = $('#namePSrc').val();
	let countrySrc = $('#countrySrc').val();
	let typePSrc = $('#typePSrc').val();
	let bookedSrc = $('#bookedSrc').val();

	//console.log("debug : " + namePSrc + " | " + countrySrc + " | " + typePSrc + " | " + bookedSrc);

	if(namePSrc != "") {
		fd1.append('nameP', namePSrc);
	}		

	if(countrySrc != "null") {
		fd1.append('country', countrySrc);
	}
	
	if(typePSrc != "All") {
		fd1.append('typeP', typePSrc);
	}

	if(bookedSrc != "All") {
		fd1.append('booked', bookedSrc);
	}	

	fd1.append('Page', page);
	
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/getTabSearchPag.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            var ret = JSON.parse(xhr.response);	
			$('#tableauProspect').html(ret['tabRet']);
			$('#pagination').html(ret['pagination']);
			//document.getElementById("pagination").innerHTML = resultat['pagination'];
        }
    }

}

function getTabProspect() {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'action/getTab.php', true);	
	xhr.send();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200)) {				
			var ret = JSON.parse(xhr.response);	
			$('#tableauProspect').html(ret['tableau']);
			console.log('I should be visibleeee');
		}
	}	
}
