<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    
    <title>Démo prospect</title>
  </head>

  <body>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0-min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
        
    <style>
        .title-white {
            color: white;
        }
        .blue {
          color: #0d6efd;
        }
    </style>
    
    <!-- Modal formulaire nouveau prospect -->
    <div class="modal fade" id="modalProspect" tabindex="-1" aria-labelledby="modalProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalProspectLabel">Ajout d'un nouveau prospect</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">	
            <div class="row row-cols-lg-auto g-3 align-items-center">
              <div class="w-50 p-3">
                <label for="nomProspect" class="form-label">Nom de l'entreprise</label>
                <input type="text" class="form-control" id="nomProspect" required>
              </div>
              <div class="w-50 p-3">
                <label for="paysProspect" class="form-label">Pays</label>
                <select class="form-select" aria-label="Select" id="paysProspect">
                  <option selected>Select a country</option>
                  <option value="AT">Austria (AT)</option>
                  <option value="BE">Belgium (BE)</option>
                  <option value="BG">Bulgaria (BG)</option>
                  <option value="HR">Croatia (HR)</option>
                  <option value="CY">Cyprus (CY)</option>
                  <option value="CZ">Czechia (CZ)</option>
                  <option value="DK">Denmark (DK)</option>
                  <option value="EE">Estonia (EE)</option>
                  <option value="FI">Finland (FI)</option>
                  <option value="FR">France (FR)</option>
                  <option value="DE">Germany (DE)</option>
                  <option value="EL">Greece (EL)</option>
                  <option value="HU">Hungary (HU)</option>
                  <option value="IE">Ireland (IE)</option>
                  <option value="IT">Italy (IT)</option>
                  <option value="LV">Latvia (LV)</option>
                  <option value="LT">Lithuania (LT)</option>
                  <option value="LU">Luxembourg (LU)</option>
                  <option value="NL">Netherlands (NL)</option>	
                  <option value="MT">Malta (MT)</option>
                  <option value="PL">Poland (PL)</option>
                  <option value="PT">Portugal (PT)</option>
                  <option value="RO">Romania (RO)</option>
                  <option value="SK">Slovakia (SK)</option>
                  <option value="SI">Slovenia (SI)</option>
                  <option value="ES">Spain (ES)</option>
                  <option value="ES">Sweden (SE)</option>
                </select>
              </div>
            </div>
      
            <div class="row row-cols-lg-auto g-3 align-items-center">
              <div class="w-50 p-3">
                <label for="mailProspect" class="form-label">Email</label>
                <input type="email" class="form-control" id="mailProspect">
              </div>
              <div class="w-50 p-3">
                <label for="telProspect" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control" id="telProspect">
              </div>
            </div><br>
      
            <div class="row row-cols-lg-auto g-3 align-items-center">  
              <label for="inlineRadioOptions" class="form-label">&nbsp;&nbsp;Type :&nbsp;&nbsp;&nbsp;</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="transport">
                <label class="form-check-label" for="inlineRadio1">Transport</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="logistique">
                <label class="form-check-label" for="inlineRadio2">Logistique</label>
              </div>
            </div><br>
      
            <div class="row row-cols-lg-auto g-3 align-items-center">            
              
              <div class="w-50 p-3">
                <label for="acteurEchange" class="form-label">Quelqu'un s'occupe-t-il déjà de ce prospect ?</label>
                <select id="acteurEchange" class="form-select" aria-label="Select">
                  <option value="Non" selected>Non</option>
                  <option value="m1">Manager 1</option>
                  <option value="m2">Manager 2</option>
                  <option value="m3">Manager 3</option>
                  <option value="m4">Manager 4</option>
                  <option value="m5">Manager 5</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add prospect</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal démo historique avec un prospect -->
    <div class="modal fade" id="modalHistorique" tabindex="-1" aria-labelledby="modalHistoriqueLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalHistoriqueLabel">Historique des échanges avec Autotransport</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">	
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Date du dernier échange</th>
                  <th scope="col">Acteur</th>
                  <th scope="col">Commentaire</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>17/11/2022</td>
                  <td>Manager 11</td>
                  <td>L'entreprise n'est pas intéressée par nos services.</td>
                </tr>
                <tr>
                  <td>02/04/2022</td>
                  <td>Manager 2</td>
                  <td>Suite à une longue conversation téléphonique, l'entreprise sera susceptible de travailler avec nous fin 2022.</td>
                </tr>
                <tr>
                  <td>29/10/2021</td>
                  <td>Manager 9</td>
                  <td>L'entreprise a déjà un partenaire commercial qui répond à ses besoins.</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal démo archivage prospect -->
    <div class="modal fade" id="modalArchive" tabindex="-1" aria-labelledby="modalArchiveLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalArchiveLabel">Archivage d'Autotransport</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">	
            <p>Fait le <?=date('d-m-y');?> par Manager 8</p>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Commentaire sur l'expérience de prospection..." id="commentaire" style="height: 110px;"></textarea>
              <label for="commentaire">Retour d'expérience</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Valider</button>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="container-fluid">
      
        <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
          <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
              <a class="navbar-brand" href="/"><img width="120"  src="http://www.intergate-group.com/wp-content/uploads/2017/11/intergate-group.png" alt="Intergate Group"></a>
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="">Groups</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="">Partners</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="">Mails</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="./">Prospect</a>
                  </li>
              </ul>
              <ul class="navbar-nav my-2 my-lg-0 ms-auto">
                  <li class="nav-item my-2 my-sm-0" style = "display: inline;width: 80px;text-align: center; float: right;">
                      <a class="nav-link" href="#">Logout</a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="col py-3">
            <h1>Liste des prospects</h1>
            <p>Page permettant de voir la liste des prospect, de faire une recherche, et d'en ajouter des nouveaux !</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProspect">Ajouter un prospect</button><br><br>
            
            <button type="button" class="btn btn-secondary" id="btnToggleSrc">
              <svg xmlns="./icons-bs-1.5.0/icons/search.svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
              </svg>
            </button><br>
            
            <div id="zoneSrc" style="display: none;">
              <div class="row row-cols-lg-auto g-3 align-items-center">
                <div class="w-25 p-3">
                  <label for="nomProspectSrc" class="form-label">Nom de l'entreprise</label>
                  <input type="text" class="form-control" id="nomProspectSrc" required>
                </div>
                <div class="w-25 p-3">
                  <label for="paysSrc" class="form-label">Pays</label>
                  <select class="form-select" aria-label="Select" id="paysSrc">
                    <option selected>Select a country</option>
                    <option value="AT">Austria (AT)</option>
                    <option value="BE">Belgium (BE)</option>
                    <option value="BG">Bulgaria (BG)</option>
                    <option value="HR">Croatia (HR)</option>
                    <option value="CY">Cyprus (CY)</option>
                    <option value="CZ">Czechia (CZ)</option>
                    <option value="DK">Denmark (DK)</option>
                    <option value="EE">Estonia (EE)</option>
                    <option value="FI">Finland (FI)</option>
                    <option value="FR">France (FR)</option>
                    <option value="DE">Germany (DE)</option>
                    <option value="EL">Greece (EL)</option>
                    <option value="HU">Hungary (HU)</option>
                    <option value="IE">Ireland (IE)</option>
                    <option value="IT">Italy (IT)</option>
                    <option value="LV">Latvia (LV)</option>
                    <option value="LT">Lithuania (LT)</option>
                    <option value="LU">Luxembourg (LU)</option>
                    <option value="NL">Netherlands (NL)</option>	
                    <option value="MT">Malta (MT)</option>
                    <option value="PL">Poland (PL)</option>
                    <option value="PT">Portugal (PT)</option>
                    <option value="RO">Romania (RO)</option>
                    <option value="SK">Slovakia (SK)</option>
                    <option value="SI">Slovenia (SI)</option>
                    <option value="ES">Spain (ES)</option>
                    <option value="ES">Sweden (SE)</option>
                  </select>
                </div>
                <div class="w-25 p-3">
                  <label for="typeSrc" class="form-label">Type</label>
                  <select class="form-select" aria-label="Select">
                    <option value="Tous" selected>Tous</option>
                    <option value="Transport">Transport</option>
                    <option value="Logistique">Logistique</option>
                  </select>
                </div>
                <div class="w-25 p-3">
                  <label for="reservationSrc" class="form-label">Réservé</label>
                  <select class="form-select" aria-label="Select">
                    <option value="Tous" selected>Tous</option>
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="table-responsive">
            <table class="table table-bordered" style="font-size: 90%">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Pays</th>
                  <th scope="col">Type</th>
                  <th scope="col">Mail </th>
                  <th scope="col">Tel</th>
                  <th scope="col">Réservé</th>
                  <th scope="col">Limite</th>
                  <th scope="col">Création</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Autotransport</td>
                  <td>FR</td>
                  <td>Logistique</td>
                  <td>machin.dupont@autotransport.fr</td>
                  <td>+33701020304</td>
                  <td>Oui (Manager 8)</td>
                  <td>18/09/2021</td>
                  <td>03/08/2021</td>
                  <td>
                    <button class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#modalHistorique">
                      <svg xmlns="./icons-bs-1.5.0/icons/eye-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-eye-fill blue" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/pencil-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-fill blue" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#modalArchive">
                      <svg xmlns="./icons-bs-1.5.0/icons/archive-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-archive-fill blue" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Car-Factory</td>
                  <td>DE</td>
                  <td>Transport</td>
                  <td>commercial.carfactory@de</td>
                  <td>+44840789878</td>
                  <td>Non</td>
                  <td>-</td>
                  <td>15/09/2021</td>
                  <td>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/eye-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-eye-fill blue" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/pencil-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-fill blue" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/archive-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-archive-fill blue" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Mobilauto</td>
                  <td>BE</td>
                  <td>Logistique</td>
                  <td>logistique@mobilauto.be</td>
                  <td>+32398999899</td>
                  <td>Oui (Manager 3)</td>
                  <td>12/10/2021</td>
                  <td>27/02/2021</td>
                  <td>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/eye-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-eye-fill blue" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/pencil-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-fill blue" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/archive-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-archive-fill blue" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Autoto</td>
                  <td>FR</td>
                  <td>Transport</td>
                  <td>bonjour@autoto.fr</td>
                  <td>+33451265489</td>
                  <td>Oui (Manager 2)</td>
                  <td>30/09/2021</td>
                  <td>16/04/2021</td>
                  <td>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/eye-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-eye-fill blue" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/pencil-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-fill blue" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>
                    </button>
                    <button class="btn btn-primary-outline">
                      <svg xmlns="./icons-bs-1.5.0/icons/archive-fill.svg" width="30" height="30" fill="currentColor" class="bi bi-archive-fill blue" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <nav aria-label="Page navigation example">              
              <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>              
            </nav>
      </div>
    </div>
        
    <script>
      window.onload = function(e){ 
        console.log("do something on load"); 
      }
      
      btnToggleSrc = document.getElementById("btnToggleSrc");
      zoneSrc = document.getElementById("zoneSrc");
      
      btnToggleSrc.onclick = function(e) {
        if (zoneSrc.style.display === "none") {
          zoneSrc.style.display = "block";
        } else {
          zoneSrc.style.display = "none";
        }
      }
    </script>
  
  </body>
</html>