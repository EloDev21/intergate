function xhrNewProspect() {
    
    let fd1 = new FormData();	
	 
    let nameP = $("#nameP").val();
    let country = $("#country").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
	let typeP = $("input[name='typeP']:checked").val();
    let actor = $("#actor").val();
	
	var boolCheck = true;
    
    //console.log("Debug new prospect : " + name + " | " + country + " | " + email + " | " + phone + " | " + typeP  + " | " + actor);

	if(nameP === '') {
		toastr.warning("Form error : Please enter the company name.");
		boolCheck = false;
	}
	
	if(country === null) {
		toastr.warning("Form error : Please select the company location.");
		boolCheck = false;
	}
    
    if(email === '') {
        toastr.warning("Form error : Please enter the company mail.");
		boolCheck = false;
    }

    if(phone === '') {
        toastr.warning("Form error : Please enter the company phone.");
		boolCheck = false;
    }

    if(typeP === undefined) {
		toastr.warning("Form error : Please select the company type.");
		boolCheck = false;
	}

    if(boolCheck === false)
        return 1;
    
    fd1 = new FormData();
    fd1.append('nameP', nameP);
    fd1.append('country', country);
    fd1.append('email', email);
    fd1.append('phone', phone);
    fd1.append('typeP', typeP);
    fd1.append('actor', actor);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/newProspect.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            getTabPSearch(1);
            $('#modalNewProspect').modal('hide');
            $('#formNewProspect').trigger("reset");
        }
    }	    
}

function xhrDeleteProspect(idProspect) {   
    fd1 = new FormData();
    fd1.append('id', idProspect);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/delProspect.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            getTabPSearch(1);
            $('#modalDeleteProspect').modal('hide');
            console.log('Arg, i\'ve been deleted...')
        }
    } 
}

function getDataEdit(idProspect) {
	fd1 = new FormData();
    fd1.append('idProspect', idProspect);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/getDataEdit.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            let ret = JSON.parse(xhr.response);	
            let typeP = ret['typeP'];
            let nameP = ret['nameP'];
            let email = ret['email'];
            let phone = ret['phone'];
            let country = ret['country'];
            let actor = ret['actor'];
            //let available = ret['available'];
            //let creation= ret['creation' ];
            //let limit = ret['limit'];
            
            $('#modalEditProspectLabel').text('Edit prospect ' + nameP);
            if(typeP === "Client") {
                $("#typeProspectClientEdit").prop("checked", true);
            } else {
                $("#typeProspectCarrierEdit").prop("checked", true);
            }
            $('#namePEdit').val(nameP);
            $('#emailEdit').val(email);
            $('#phoneEdit').val(phone);
            $('#countryEdit option[value="'+country+'"]').prop('selected', true);
            $('#actorEdit option[value="'+actor+'"]').prop('selected', true); 
            $('#btnSendEditProspect').attr('onclick', 'xhrEditProspect('+idProspect+')');
            $('#modalEditProspect').modal('show');
        }
    } 
}

function xhrEditProspect(idProspect) {
    let fd1 = new FormData();	    
    let nameP = $("#namePEdit").val();
    let country = $("#countryEdit").val();
    let email = $("#emailEdit").val();
    let phone = $("#phoneEdit").val();
	let typeP = $("input[name='typePEdit']:checked").val();
    let actor = $("#actorEdit").val();
	
	var boolCheck = true;
    
    //console.log("Debug edit prospect : " + nameP + " | " + country + " | " + email + " | " + phone + " | " + typeP  + " | " + actor);

	if(nameP === '') {
		toastr.warning("Form error : Please enter the company name.");
		boolCheck = false;
	}
	
	if(country === null) {
		toastr.warning("Form error : Please select the company location.");
		boolCheck = false;
	}
    
    if(email === '') {
        toastr.warning("Form error : Please enter the company mail.");
		boolCheck = false;
    }

    if(phone === '') {
        toastr.warning("Form error : Please enter the company phone.");
		boolCheck = false;
    }

    if(typeP === undefined) {
		toastr.warning("Form error : Please select the company type.");
		boolCheck = false;
	}

    if(boolCheck === false)
        return 1;
    
    fd1 = new FormData();
    fd1.append('id', idProspect);
    fd1.append('nameP', nameP);
    fd1.append('country', country);
    fd1.append('email', email);
    fd1.append('phone', phone);
    fd1.append('typeP', typeP);
    fd1.append('actor', actor);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/editProspect.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            getTabPSearch(1);
            $('#modalEditProspect').modal('hide');
            $('#formEditProspect').trigger("reset");
            //console.log('Debug log : Edit done')
        }
    }
}

function xhrBookProspect(idProspect) {   
    fd1 = new FormData();
    fd1.append('id', idProspect);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/bookProspect.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            getTabPSearch(1);
            $('#modalBookProspect').modal('hide');
            //console.log('Debug ')
        }
    } 
}

function xhrArchiveProspect(idProspect) {   
    fd1 = new FormData();
    fd1.append('id', idProspect);
    fd1.append('comment', $('#commentT').val());

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/archiveProspect.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            getTabPSearch(1);
            $('#modalArchiveProspect').modal('hide');
            $('#formArchiveProspect').trigger("reset");
            //console.log('Debug : Archive done');
        }
    } 
}

function getDataHistory(idProspect) {
	fd1 = new FormData();
    fd1.append('idProspect', idProspect);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/getDataHistory.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            let ret = JSON.parse(xhr.response);	
            let tabRet = ret['tab'];            
            $('#modalHistoryLabel').text('History of all the exchanges with '+$('#nameP'+idProspect).text());
            $('#tabHistory').html(tabRet);
            $('#modalHistory').modal('show');
        }
    } 
}

function getDataOffers(idProspect) {
	fd1 = new FormData();
    fd1.append('idProspect', idProspect);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/getDataOffers.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            let ret = JSON.parse(xhr.response);	
            let tabRet = ret['tab'];            
            $('#modalOffersLabel').text('History of all the offers with '+$('#nameP'+idProspect).text());
            $('#tabOffers').html(tabRet);
            $('#btnNewOffer').attr('onclick', 'openModalOffers('+idProspect+')');
            $('#modalOffers').modal('show');
        }
    } 
}

function xhrNewOffer(idProspect) {
    
    let cityFrom = $("#cityFrom").val();
    let cityTo = $("#cityTo").val();
    let offer = $("#offer").val();
    let commentO = $("#commentO").val();

    let boolCheck = true;

    if(cityFrom === '') {
		toastr.warning("Form error : Please enter the departure city.");
		boolCheck = false;
	}

    if(cityFrom.length > 100) {
		toastr.warning("Form error : The departure city name can't be longer than 100 caracters.");
		boolCheck = false;
	}

    if(cityTo === '') {
		toastr.warning("Form error : Please enter the arrival city.");
		boolCheck = false;
	}

    if(cityTo.length > 100) {
		toastr.warning("Form error : The arrival city name can't be longer than 100 caracters.");
		boolCheck = false;
	}

    if(offer === '') {
		toastr.warning("Form error : Please enter the offer you made in euros.");
		boolCheck = false;
	}

    if(commentO === '') {
		toastr.warning("Form error : Please enter the comment you can make on the offer.");
		boolCheck = false;
	}

    if(commentO.length > 300) {
		toastr.warning("Form error : The comment you made can't be longer than 300 caracters.");
		boolCheck = false;
	}

    if(boolCheck === false)
        return 1;

    fd1 = new FormData();
    fd1.append('id', idProspect);
    fd1.append('cityFrom', cityFrom);
    fd1.append('cityTo', cityTo);
    fd1.append('offer', offer);
    fd1.append('commentO', commentO);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'action/newOffer.php', true);	
    xhr.send(fd1);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200)) {				
            getDataOffers(idProspect);
            $('#modalNewOfferProspect').modal('hide');
            $('#formNewOfferProspect').trigger("reset");
            console.log('Great, a new offer has been added.')
        }
    }

}