<?php
session_start();

if(!isset($_SESSION['firstname']) || strlen($_SESSION['firstname']) <= 0){
  header("location: ../index.php");
  exit;
}

$managerId = $_SESSION['id_manager'];
$managerFName = $_SESSION['firstname'];

$title = "Intergate Logistics - Prospection";
require_once("../resources/nav_head.php");
?>
<script></script>

<!doctype html>
<html lang="en">
  <body>
    
    <script>const managerId = <?=json_encode($managerId)?>;</script>        
    <script>const managerFName = <?=json_encode($managerFName)?>;</script>        
    
    <style>
        .title-white {
            color: white;
        }
        .blue {
          color: #0d6efd;
        }
        .hand {
          cursor: pointer;
        }
    </style>
    
    <script>
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "6000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    </script>

    <div class="container-fluid">
      <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
        <!-- NAVBAR -->
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <a class="navbar-brand" href="./">
              <img width="120"  src="http://www.intergate-group.com/wp-content/uploads/2017/11/intergate-group.png" alt="Intergate Group">
            </a>
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="./">Prospect</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../price/calculator.php">Calculator</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="">Mails</a>
              </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0 ms-auto">
                <li class="nav-item my-2 my-sm-0" style = "display: inline; width: 200px;text-align: center; float: right;">
                    <a class="nav-link" href="../logout.php">Logout (<?=$managerFName?>)</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- PARTIE CENTRALE -->
      <div class="col py-3">
        <h1>Prospects List</h1>
        <p>Page allowing the user to track the progession of the relation with the prospects of Intergate.</p>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" id="btnNewProspect">Add a prospect</button><br><br>
        
        <button type="button" class="btn btn-secondary" id="btnToggleSrc">
          <svg xmlns="./icons-bs-1.5.0/icons/search.svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
          </svg>
        </button><br>
        
        <div id="zoneSrc" style="display: none;">
          <div class="row row-cols-lg-auto g-3 align-items-center">
            <div class="w-25 p-3">
              <label for="namePSrc" class="form-label">Company name</label>
              <input type="text" class="form-control" id="namePSrc" required>
            </div>
            <div class="w-25 p-3">
              <label for="countrySrc" class="form-label">Country</label>
              <select class="form-select" aria-label="Select" id="countrySrc" >
                <option value="null" selected>Select a country</option>
          	    <option value="AX">🇦🇽 Åland Islands</option>
          	    <option value="AL">🇦🇱 Albania</option>          	
          	    <option value="AD">🇦🇩 Andorra</option>          	
          	    <option value="AT">🇦🇹 Austria</option>          	
          	    <option value="BY">🇧🇾 Belarus</option>
          	    <option value="BE">🇧🇪 Belgium</option>
          	    <option value="BA">🇧🇦 Bosnia and Herzegovina</option>
          	    <option value="BG">🇧🇬 Bulgaria</option>          	
          	    <option value="HR">🇭🇷 Croatia</option>          	
          	    <option value="CY">🇨🇾 Cyprus</option>
          	    <option value="CZ">🇨🇿 Czech Republic</option>
          	    <option value="DK">🇩🇰 Denmark</option>          	
          	    <option value="EE">🇪🇪 Estonia</option>          	
          	    <option value="FO">🇫🇴 Faroe Islands</option>          	
          	    <option value="FI">🇫🇮 Finland</option>
          	    <option value="FR">🇫🇷 France</option>          	
          	    <option value="DE">🇩🇪 Germany</option>          	
          	    <option value="GI">🇬🇮 Gibraltar</option>
          	    <option value="GR">🇬🇷 Greece</option>          	
          	    <option value="GG">🇬🇬 Guernsey</option>          	
          	    <option value="VA">🇻🇦 Holy See (Vatican City State)</option>          	
          	    <option value="HU">🇭🇺 Hungary</option>
          	    <option value="IS">🇮🇸 Iceland</option>          	
          	    <option value="IE">🇮🇪 Ireland</option>
          	    <option value="IM">🇮🇲 Isle of Man</option>          	
          	    <option value="IT">🇮🇹 Italy</option>          	
          	    <option value="JE">🇯🇪 Jersey</option>          	
          	    <option value="LV">🇱🇻 Latvia</option>          	
          	    <option value="LI">🇱🇮 Liechtenstein</option>
          	    <option value="LT">🇱🇹 Lithuania</option>
          	    <option value="LU">🇱🇺 Luxembourg</option>          	
          	    <option value="MK">🇲🇰 Macedonia, the former Yugoslav Republic of</option>
			          <option value="MT">🇲🇹 Malta</option>         			
          	    <option value="MD">🇲🇩 Moldova, Republic of</option>
          	    <option value="MC">🇲🇨 Monaco</option>          	
          	    <option value="ME">🇲🇪 Montenegro</option>          	
          	    <option value="NL">🇳🇱 Netherlands</option>   
          	    <option value="NO">🇳🇴 Norway</option>          	
          	    <option value="PL">🇵🇱 Poland</option>
          	    <option value="PT">🇵🇹 Portugal</option>          	
          	    <option value="RO">🇷🇴 Romania</option>
          	    <option value="RU">🇷🇺 Russian Federation</option>          	          	
          	    <option value="RS">🇷🇸 Serbia</option>          	
          	    <option value="SK">🇸🇰 Slovakia</option>
          	    <option value="SI">🇸🇮 Slovenia</option>          	
          	    <option value="ES">🇪🇸 Spain</option>          	
          	    <option value="SJ">🇸🇯 Svalbard and Jan Mayen</option>          	
          	    <option value="SE">🇸🇪 Sweden</option>
          	    <option value="CH">🇨🇭 Switzerland</option>          	
          	    <option value="UA">🇺🇦 Ukraine</option>          	
          	    <option value="GB">🇬🇧 United Kingdom</option>
              </select>
            </div>
            <div class="w-25 p-3">
              <label for="typePSrc" class="form-label">Type</label>
              <select class="form-select" aria-label="Select" id="typePSrc" >
                <option value="All" selected>All</option>
                <option value="Client">Client</option>
                <option value="Carrier">Carrier</option>
              </select>
            </div>
            <div class="w-25 p-3">
              <label for="bookedSrc" class="form-label">Available</label>
              <select class="form-select" aria-label="Select" id="bookedSrc" >
                <option value="All" selected>All</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>        
        </div>
        
        <div id="tableauProspect"></div>

        <div id="pagination"></div>
        
      </div>
    </div>
    
    <!-- MODALS -->
    
    <!-- Modal formulaire nouveau prospect -->
    <div class="modal fade" id="modalNewProspect" tabindex="-1" aria-labelledby="modalNewProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form id="formNewProspect">
            <div class="modal-header">
              <h5 class="modal-title" id="modalNewProspectLabel">Add a new prospect</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">	
              <div class="row row-cols-lg-auto g-3 align-items-center">
                <div class="w-50 p-3">
                  <label for="nameP" class="form-label">Company name</label>
                  <input type="text" class="form-control" id="nameP" required>
                </div>
                <div class="w-50 p-3">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-select" aria-label="Select" id="country">
                  <option disabled selected style="display:none">Select a country</option>
          	        <option value="AX">🇦🇽 Åland Islands</option>
          	        <option value="AL">🇦🇱 Albania</option>          	
          	        <option value="AD">🇦🇩 Andorra</option>          	
          	        <option value="AT">🇦🇹 Austria</option>          	
          	        <option value="BY">🇧🇾 Belarus</option>
          	        <option value="BE">🇧🇪 Belgium</option>
          	        <option value="BA">🇧🇦 Bosnia and Herzegovina</option>
          	        <option value="BG">🇧🇬 Bulgaria</option>          	
          	        <option value="HR">🇭🇷 Croatia</option>          	
          	        <option value="CY">🇨🇾 Cyprus</option>
          	        <option value="CZ">🇨🇿 Czech Republic</option>
          	        <option value="DK">🇩🇰 Denmark</option>          	
          	        <option value="EE">🇪🇪 Estonia</option>          	
          	        <option value="FO">🇫🇴 Faroe Islands</option>          	
          	        <option value="FI">🇫🇮 Finland</option>
          	        <option value="FR">🇫🇷 France</option>          	
          	        <option value="DE">🇩🇪 Germany</option>          	
          	        <option value="GI">🇬🇮 Gibraltar</option>
          	        <option value="GR">🇬🇷 Greece</option>          	
          	        <option value="GG">🇬🇬 Guernsey</option>          	
          	        <option value="VA">🇻🇦 Holy See (Vatican City State)</option>          	
          	        <option value="HU">🇭🇺 Hungary</option>
          	        <option value="IS">🇮🇸 Iceland</option>          	
          	        <option value="IE">🇮🇪 Ireland</option>
          	        <option value="IM">🇮🇲 Isle of Man</option>          	
          	        <option value="IT">🇮🇹 Italy</option>          	
          	        <option value="JE">🇯🇪 Jersey</option>          	
          	        <option value="LV">🇱🇻 Latvia</option>          	
          	        <option value="LI">🇱🇮 Liechtenstein</option>
          	        <option value="LT">🇱🇹 Lithuania</option>
          	        <option value="LU">🇱🇺 Luxembourg</option>          	
          	        <option value="MK">🇲🇰 Macedonia, the former Yugoslav Republic of</option>
			              <option value="MT">🇲🇹 Malta</option>         			
          	        <option value="MD">🇲🇩 Moldova, Republic of</option>
          	        <option value="MC">🇲🇨 Monaco</option>          	
          	        <option value="ME">🇲🇪 Montenegro</option>          	
          	        <option value="NL">🇳🇱 Netherlands</option>   
          	        <option value="NO">🇳🇴 Norway</option>          	
          	        <option value="PL">🇵🇱 Poland</option>
          	        <option value="PT">🇵🇹 Portugal</option>          	
          	        <option value="RO">🇷🇴 Romania</option>
          	        <option value="RU">🇷🇺 Russian Federation</option>          	          	
          	        <option value="RS">🇷🇸 Serbia</option>          	
          	        <option value="SK">🇸🇰 Slovakia</option>
          	        <option value="SI">🇸🇮 Slovenia</option>          	
          	        <option value="ES">🇪🇸 Spain</option>          	
          	        <option value="SJ">🇸🇯 Svalbard and Jan Mayen</option>          	
          	        <option value="SE">🇸🇪 Sweden</option>
          	        <option value="CH">🇨🇭 Switzerland</option>          	
          	        <option value="UA">🇺🇦 Ukraine</option>          	
          	        <option value="GB">🇬🇧 United Kingdom</option>
                  </select>
                </div>
              </div>

              <div class="row row-cols-lg-auto g-3 align-items-center">
                <div class="w-50 p-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="w-50 p-3">
                  <label for="phone" class="form-label">Phone number</label>
                  <input type="text" class="form-control" id="phone">
                </div>
              </div><br>

              <div class="row row-cols-lg-auto g-3 align-items-center">  
                <label for="typeP" class="form-label">&nbsp;&nbsp;Type :&nbsp;&nbsp;&nbsp;</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typeP" id="typeProspectClient" value="Client">
                  <label class="form-check-label" for="typeProspectClient">Client</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typeP" id="typeProspectCarrier" value="Carrier">
                  <label class="form-check-label" for="typeProspectCarrier">Carrier</label>
                </div>
              </div><br>

              <div class="row row-cols-lg-auto g-3 align-items-center">            
                <div class="w-50 p-3">
                  <label for="actor" class="form-label">Is a manager already prospecting this company?</label>
                  <select id="actor" class="form-select" aria-label="Select">
                    <option value="No" selected>No</option>
                    <option value="Lucy">Lucy</option>
                    <option value="Charlie">Charlie</option>
                    <option value="Alice">Alice</option>
                    <option value="Franck">Franck</option>
                    <option value="Dylan">Dylan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="xhrNewProspect();">Add prospect</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Modal formulaire edit prospect -->
    <div class="modal fade" id="modalEditProspect" tabindex="-1" aria-labelledby="modalEditProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form id="formEditProspect">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditProspectLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">	
              <div class="row row-cols-lg-auto g-3 align-items-center">
                <div class="w-50 p-3">
                  <label for="namePEdit" class="form-label">Company name</label>
                  <input type="text" class="form-control" id="namePEdit" required>
                </div>
                <div class="w-50 p-3">
                  <label for="countryEdit" class="form-label">Country</label>
                  <select class="form-select" aria-label="Select" id="countryEdit">
                    <option disabled selected style="display:none">Select a country</option>
          	        <option value="AX">🇦🇽 Åland Islands</option>
          	        <option value="AL">🇦🇱 Albania</option>          	
          	        <option value="AD">🇦🇩 Andorra</option>          	
          	        <option value="AT">🇦🇹 Austria</option>          	
          	        <option value="BY">🇧🇾 Belarus</option>
          	        <option value="BE">🇧🇪 Belgium</option>
          	        <option value="BA">🇧🇦 Bosnia and Herzegovina</option>
          	        <option value="BG">🇧🇬 Bulgaria</option>          	
          	        <option value="HR">🇭🇷 Croatia</option>          	
          	        <option value="CY">🇨🇾 Cyprus</option>
          	        <option value="CZ">🇨🇿 Czech Republic</option>
          	        <option value="DK">🇩🇰 Denmark</option>          	
          	        <option value="EE">🇪🇪 Estonia</option>          	
          	        <option value="FO">🇫🇴 Faroe Islands</option>          	
          	        <option value="FI">🇫🇮 Finland</option>
          	        <option value="FR">🇫🇷 France</option>          	
          	        <option value="DE">🇩🇪 Germany</option>          	
          	        <option value="GI">🇬🇮 Gibraltar</option>
          	        <option value="GR">🇬🇷 Greece</option>          	
          	        <option value="GG">🇬🇬 Guernsey</option>          	
          	        <option value="VA">🇻🇦 Holy See (Vatican City State)</option>          	
          	        <option value="HU">🇭🇺 Hungary</option>
          	        <option value="IS">🇮🇸 Iceland</option>          	
          	        <option value="IE">🇮🇪 Ireland</option>
          	        <option value="IM">🇮🇲 Isle of Man</option>          	
          	        <option value="IT">🇮🇹 Italy</option>          	
          	        <option value="JE">🇯🇪 Jersey</option>          	
          	        <option value="LV">🇱🇻 Latvia</option>          	
          	        <option value="LI">🇱🇮 Liechtenstein</option>
          	        <option value="LT">🇱🇹 Lithuania</option>
          	        <option value="LU">🇱🇺 Luxembourg</option>          	
          	        <option value="MK">🇲🇰 Macedonia, the former Yugoslav Republic of</option>
			              <option value="MT">🇲🇹 Malta</option>         			
          	        <option value="MD">🇲🇩 Moldova, Republic of</option>
          	        <option value="MC">🇲🇨 Monaco</option>          	
          	        <option value="ME">🇲🇪 Montenegro</option>          	
          	        <option value="NL">🇳🇱 Netherlands</option>   
          	        <option value="NO">🇳🇴 Norway</option>          	
          	        <option value="PL">🇵🇱 Poland</option>
          	        <option value="PT">🇵🇹 Portugal</option>          	
          	        <option value="RO">🇷🇴 Romania</option>
          	        <option value="RU">🇷🇺 Russian Federation</option>          	          	
          	        <option value="RS">🇷🇸 Serbia</option>          	
          	        <option value="SK">🇸🇰 Slovakia</option>
          	        <option value="SI">🇸🇮 Slovenia</option>          	
          	        <option value="ES">🇪🇸 Spain</option>          	
          	        <option value="SJ">🇸🇯 Svalbard and Jan Mayen</option>          	
          	        <option value="SE">🇸🇪 Sweden</option>
          	        <option value="CH">🇨🇭 Switzerland</option>          	
          	        <option value="UA">🇺🇦 Ukraine</option>          	
          	        <option value="GB">🇬🇧 United Kingdom</option>
                  </select>
                </div>
              </div>

              <div class="row row-cols-lg-auto g-3 align-items-center">
                <div class="w-50 p-3">
                  <label for="emailEdit" class="form-label">Email</label>
                  <input type="email" class="form-control" id="emailEdit">
                </div>
                <div class="w-50 p-3">
                  <label for="phoneEdit" class="form-label">Phone number</label>
                  <input type="text" class="form-control" id="phoneEdit">
                </div>
              </div><br>

              <div class="row row-cols-lg-auto g-3 align-items-center">  
                <label for="typePEdit" class="form-label">&nbsp;&nbsp;Type :&nbsp;&nbsp;&nbsp;</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typePEdit" id="typeProspectClientEdit" value="Client">
                  <label class="form-check-label" for="typeProspectClientEdit">Client</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typePEdit" id="typeProspectCarrierEdit" value="Carrier">
                  <label class="form-check-label" for="typeProspectCarrierEdit">Carrier</label>
                </div>
              </div><br>

              <div class="row row-cols-lg-auto g-3 align-items-center">            
                <div class="w-50 p-3">
                  <label for="actorEdit" class="form-label">Is a manager already prospecting this company?</label>
                  <select id="actorEdit" class="form-select" aria-label="Select">
                    <option value="No" selected>No</option>
                    <option value="Lucy">Lucy</option>
                    <option value="Charlie">Charlie</option>
                    <option value="Alice">Alice</option>
                    <option value="Franck">Franck</option>
                    <option value="Dylan">Dylan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="btnSendEditProspect">Edit prospect</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal historique avec un prospect -->
    <div class="modal fade" id="modalHistory" tabindex="-1" aria-labelledby="modalHistoryLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalHistoryLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">	
            <div id="tabHistory"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal Archive -->
    <div class="modal fade" id="modalArchiveProspect" tabindex="-1" aria-labelledby="modalArchiveProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form id="formArchiveProspect">
            <div class="modal-header">
              <h5 class="modal-title" id="modalArchiveProspectLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">	
              <p>Done the <?=date('d-m-y');?> by <?=$managerFName?></p>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Feedback on the prospection..." id="commentT" style="height: 110px;"></textarea>
                <label for="commentT">Feedback...</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnSendArchive">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Modal Delete -->
    <div class="modal fade" id="modalDeleteProspect" tabindex="-1" aria-labelledby="modalDeleteProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalDeleteProspectLabel">Deleting prospect confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="namePDelete"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="btnSendDelete">Delete</button>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Modal Book -->
    <div class="modal fade" id="modalBookProspect" tabindex="-1" aria-labelledby="modalBookProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalBookProspectLabel">Booking prospect confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="namePBook"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="btnSendBook">Book</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal validation -->
    <div class="modal fade" id="modalValidationProspect" tabindex="-1" aria-labelledby="modalValidationProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form id="formValidProspect">
            <div class="modal-header">
              <h5 class="modal-title" id="modalValidationProspectLabel">Prospect validation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p id="namePValidation"></p>
              <label for="numLot" class="form-label">Load number</label>
              <input type="text" class="form-control" id="numLot" placeholder="1234567890" minlength="1" maxlength="50">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="btnSendValidation">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Modal Offers -->
    <div class="modal fade" id="modalOffers" tabindex="-1" aria-labelledby="modalOffersLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalOffersLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">	
            <div id="tabOffers"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnNewOffer">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
              </svg>
                Add an offer
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal formulaire new offer -->
    <div class="modal fade" id="modalNewOfferProspect" tabindex="-1" aria-labelledby="modalNewOfferProspectLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form id="formNewOfferProspect">
            <div class="modal-header">
              <h5 class="modal-title" id="modalNewOfferProspectLabel">New offer for XYZ</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">	
              <div class="row row-cols-lg-auto g-3 align-items-center">
                <div class="col">
                  <label for="cityFrom" class="form-label">From</label>
                  <input type="text" class="form-control" id="cityFrom" required>
                </div>
                <div class="col">
                  <label for="cityTo" class="form-label">To</label>
                  <input type="text" class="form-control" id="cityTo" required>
                </div>
                <div class="col">
                  <label for="offer" class="form-label">Offer</label>
                  <div class="input-group">                    
                    <input type="text" class="form-control" aria-label="Amount in euros" id="offer">
                    <span class="input-group-text">€</span>
                  </div>
                </div>
              </div><br/>        
              <div class="form-floating">
                <textarea class="form-control" placeholder="Feedback on the offer" id="commentO" style="height: 200px;"></textarea>
                <label for="commentO">What can you say about the offer?</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="btnSendNewOffer">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="../resources/js/table.js"></script>
    <script src="../resources/js/xhr.js"></script>
    <script src="../resources/js/countryCodeToEmojiName.js"></script>

    <script>
      $(document).ready(function(){
        //getTabProspect();
        clearSrc();
        getTabPSearch(1);
      });  

      /*
      $('#namePSrc, #countrySrc, #typePSrc, #bookedSrc').change(function() {
        getTabPSearch();
      });
      */

      $('#namePSrc, #countrySrc, #typePSrc, #bookedSrc').on('change input', function() {
        getTabPSearch(1);
      });
      
      $('#btnToggleSrc').click(function() {
        $('#zoneSrc').toggle();
      });

      $('#btnNewProspect').click(function() {
        $('#modalNewProspect').modal('show');
      });

      function clearSrc() {
        $('#namePSrc').val('');
        //$('#countrySrc').val("null").change();
        $('#countrySrc option[value="null"]').prop('selected', true);
        //$('#typePSrc').val("All").change();
        $('#typePSrc option[value="All"]').prop('selected', true);
        //$('#bookedSrc').val("All").change();
        $('#bookedSrc option[value="All"]').prop('selected', true);
      }

      function openModalDelete(idProspect) {
        $('#namePDelete').text('Are you sure you want to delete the prospect '+$('#nameP'+idProspect).text()+' ?');
        $('#btnSendDelete').attr('onclick', 'xhrDeleteProspect('+idProspect+')');
        $('#modalDeleteProspect').modal('show');
      }

      function openModalBook(idProspect) {
        $('#namePBook').text('Do you want to book the prospect '+$('#nameP'+idProspect).text()+' ? You will have two weeks to turn this prospect into a client or a supplier.');
        $('#btnSendBook').attr('onclick', 'xhrBookProspect('+idProspect+')');
        $('#modalBookProspect').modal('show');
      }

      function openModalArchive(idProspect) {
        $('#modalArchiveProspectLabel').text('Archive of the prospect '+$('#nameP'+idProspect).text());
        $('#btnSendArchive').attr('onclick', 'xhrArchiveProspect('+idProspect+')');
        $('#modalArchiveProspect').modal('show');
      }

      function openModalValidation(idProspect) {
        $('#namePValidation').text('Do you want to validate the prospect '+$('#nameP'+idProspect).text()+' ? If the prospect type is transport, it will turn into a client. Else it will turn into a supplier.');
        //$('#btnSendValidation').attr('onclick', 'xhrValidationProspect('+idProspect+')');
        $('#modalValidationProspect').modal('show');
      }

      // Add offer on the prospect 
      function openModalOffers(idProspect) {
        $('#modalNewOfferProspectLabel').text('New offer for '+$('#nameP'+idProspect).text());
        $('#btnSendNewOffer').attr('onclick', 'xhrNewOffer('+idProspect+')');
        $('#modalNewOfferProspect').modal('show');
      }
    
      function xhrLogout() {
          
          var xhr = new XMLHttpRequest();
          xhr.open('POST', '../logout.php', true);	
          xhr.send();

          xhr.onreadystatechange = function() {
              if (xhr.readyState == 4 && (xhr.status == 200)) {				
                  toastr.success("Login successful, you will be redirected soon.");                            
                  window.location.href = "prospects/index.php";
                      
              }
          }
      } 
        

    </script>
  
  </body>
</html>