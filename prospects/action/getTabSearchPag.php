<?php

require_once('../database.php');

function boolToYN($bool)
{
  return ($bool == 1) ? "Yes" : "No";
}

$requestedPage = $_POST['Page'];
$lnBegin = (10 * ($requestedPage - 1));
$lnEnd = (10 * $requestedPage);

$rqCount = "SELECT COUNT(*) FROM (SELECT *, @rownum := @rownum + 1 AS numRow FROM PROSPECT, (SELECT @rownum := 0) r WHERE 1=1 ";
$rq = "SELECT * FROM (SELECT *, @rownum := @rownum + 1 AS numRow FROM PROSPECT, (SELECT @rownum := 0) r WHERE 1=1 ";
$arr = array();

if (isset($_POST['nameP']) && strlen($_POST['nameP']) > 0) {
  $rqCount .= "AND nameP LIKE ? ";
  $rq .= "AND nameP LIKE ? ";
  array_push($arr, "%" . $_POST['nameP'] . "%");
}

if (isset($_POST['country'])) {
  $rqCount .= "AND country=? ";
  $rq .= "AND country=? ";
  array_push($arr, $_POST['country']);
}

if (isset($_POST['typeP'])) {
  $rqCount .= "AND typeP=? ";
  $rq .= "AND typeP=? ";
  array_push($arr, $_POST['typeP']);
}

if (isset($_POST['booked'])) {
  $rqCount .= "AND available=? ";
  $rq .= "AND available=? ";
  array_push($arr, $_POST['booked']);
}

$rqCount .= "ORDER BY id DESC) AS main";
$rq .= "ORDER BY id DESC) AS main WHERE (numRow > $lnBegin AND numRow <= $lnEnd);";

$pdo = getConnexion();

$stmt = $pdo->prepare($rqCount);
(!empty($arr)) ? $stmt->execute($arr) : $stmt->execute();
$countRowsRq = $stmt->fetchColumn();
$pageNumber = $pageNb = ceil($countRowsRq / 10);

$stmt = $pdo->prepare($rq);
(!empty($arr)) ? $stmt->execute($arr) : $stmt->execute();
$data = $stmt->fetchAll();
//print_r($pdo->errorInfo());

if ($stmt->rowCount() == 0) {
  $tableau = "<p>There is no result with the current search parameters!</p>";
  $array = array('tabRet' => $tableau);
  echo json_encode($array);
  exit();
}

$tabHead = "<div class='table-responsive'>
                    <table class='table table-bordered' style='font-size: 90%'>
                        <thead>
                            <tr>
                                <th scope='col'>Name</th>
                                <th scope='col'>Country</th>
                                <th scope='col'>Type</th>
                                <th scope='col'>Email </th>
                                <th scope='col'>Phone</th>
                                <th scope='col'>Available</th>
                                <th scope='col'>Deadline</th>
                                <th scope='col'>Creation</th>
                                <th scope='col'>Action</th>
                            </tr>
                        </thead>
                        <tbody>";

$tableau = $tabHead;

foreach ($data as $row) {
  $tableau .= "
                <tr>
                  <td id='nameP" . $row['id'] . "'>" . $row['nameP'] . "</td>
                  <td id='countryP" . $row['id'] . "'></td>
                  <script>$('#countryP" . $row['id'] . "').html(countryCodeToEmojiName('" . $row['country'] . "'));</script>
                  <td>" . $row['typeP'] . "</td>
                  <td>" . $row['email'] . "</td>
                  <td>" . $row['phone'] . "</td>";

  if ($row['available'] == 1) {
    $tableau .= "          
                  <td>" . boolToYN($row['available']) . "</td>";
  } else {
    $tableau .= "          
                  <td>" . boolToYN($row['available']) . " (" . $row['actor'] . ")</td>";
  }

  $tableau .= "          
                  <td>" . $row['deadline'] . "</td>
                  <td>" . $row['creation'] . "</td>
                  <td style='padding-top: 2px; padding-bottom: 2px;'>
                    <button class='btn btn-primary-outline' onclick='openModalBook(" . $row['id'] . ")'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor' class='bi bi-bookmark blue' viewBox='0 0 16 16'>
                        <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z'/>
                      </svg>
                    </button>                    
                    <button class='btn btn-primary-outline' onclick='getDataHistory(" . $row['id'] . ")'>
                      <svg xmlns='./icons-bs-1.5.0/icons/eye.svg' width='26' height='26' fill='currentColor' class='bi bi-eye blue' viewBox='0 0 16 16'>
                        <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                        <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                      </svg>
                    </button>
                    <button class='btn btn-primary-outline' onclick='getDataOffers(" . $row['id'] . ")'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor' class='bi bi-currency-euro blue' viewBox='0 0 16 16'>
                        <path d='M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z'/>
                      </svg>
                    </button>
                    <button class='btn btn-primary-outline' onclick='openModalValidation(" . $row['id'] . ")'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor' class='bi bi-check2 blue' viewBox='0 0 16 16'>
                        <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                      </svg>
                    </button>
                    <button class='btn btn-primary-outline' onclick='openModalArchive(" . $row['id'] . ")'>
                      <svg xmlns='./icons-bs-1.5.0/icons/archive.svg' width='26' height='26' fill='currentColor' class='bi bi-archive blue' viewBox='0 0 16 16'>
                      <path d='M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
                      </svg>
                    </button>
                    <button class='btn btn-primary-outline' onclick='getDataEdit(" . $row['id'] . ")'>
                      <svg xmlns='./icons-bs-1.5.0/icons/pencil.svg' width='26' height='26' fill='currentColor' class='bi bi-pencil blue' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                      </svg>
                    </button>
                    <button class='btn btn-primary-outline' onclick='openModalDelete(" . $row['id'] . ")'>
                      <svg xmlns='./icons-bs-1.5.0/icons/trash.svg' width='26' height='26' fill='currentColor' class='bi bi-trash blue' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                      </svg>
                    </button>
                  </td>
                </tr>";
}

$tabFoot = "
            </tbody>
        </table>
    </div>";
$tableau .= $tabFoot;

//-------------------------------PAGINATION-------------------------------------------
/*
    $pagination = "
    <nav aria-label='Page navigation example'>              
      <ul class='pagination justify-content-center'>
        <li class='page-item'><a class='page-link' href='#'>Previous</a></li>
        <li class='page-item'><a class='page-link' href='#'>1</a></li>
        <li class='page-item'><a class='page-link' href='#'>2</a></li>
        <li class='page-item'><a class='page-link' href='#'>3</a></li>
        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
      </ul>              
    </nav>";
    */

if ($pageNumber != 1) {

  $isFirstP = ($requestedPage == 1) ? "disabled" : "";
  $isLastP  = ($requestedPage == $pageNb) ? "disabled" : "";

  $numPageBeforecurrP = $requestedPage - 1;
  $numPageAfterCurrP = $requestedPage + 1;

  $pagination = "";
  $pagination .= "<nav role='navigation' aria-label='Page navigation example'>";
  $pagination .= "<ul class='pagination justify-content-center'>";

  //DEBUT
  $pagination .= "<li class='page-item page-skip $isFirstP'>";
  $pagination .= "<a class='page-link' onclick='getTabPSearch(1)' >";
  $pagination .= "<i class='icons-arrow-double icons-rotate-180 icons-size-x5' aria-hidden='true'></i>";
  $pagination .= "<span class='d-none d-sm-inline ml-2'>Début</span>";
  $pagination .= "</a>";
  $pagination .= "</li>";

  //PAGE PRECEDENTE
  $pagination .= "<li class='page-item page-skip $isFirstP'>";
  $pagination .= "<a class='page-link' onclick='getTabPSearch($numPageBeforecurrP)'>";
  $pagination .= "<i class='icons-arrow-prev icons-size-x5' aria-hidden='true'></i>";
  $pagination .= "<span class='d-none d-sm-inline ml-2'>Previous</span>";
  $pagination .= "</a>";
  $pagination .= "</li>";

  if ($requestedPage == 1 && $pageNb == 2) {
    $pagination .= "<li class='page-item active'><a class='page-link' onclick=''>1</a></li>";
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch(2)'>2</a></li>";
  } else if ($requestedPage == 1) {
    //Gestion du cas où nous sommes sur la page 1
    $pagination .= "<li class='page-item active'><a class='page-link' onclick=''>1</a></li>";
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch(2)'>2</a></li>";
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch(3)'>3</a></li>";
  } elseif ($requestedPage == $pageNb) {
    //Gestion du cas où nous sommes sur la dernière page
    $nb = $pageNb - 2;
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch($nb)'>$nb</a></li>";
    $nb = $pageNb - 1;
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch($nb)'>$nb</a></li>";
    $pagination .= "<li class='page-item active'><a class='page-link' onclick=''>$pageNb</a></li>";
  } else {
    //Gestion du cas où nous sommes dans une plage entre 2 et pageNb-1
    $nb = $requestedPage - 1;
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch($nb)'>$nb</a></li>";
    $pagination .= "<li class='page-item active'><a class='page-link' onclick='getTabPSearch($requestedPage)'>$requestedPage</a></li>";
    $nb = $requestedPage + 1;
    $pagination .= "<li class='page-item'><a class='page-link' onclick='getTabPSearch($nb)'>$nb</a></li>";
  }

  //PAGE SUIVANTE
  $pagination .= "<li class='page-item page-skip $isLastP'>";
  $pagination .= "<a class='page-link' onclick='getTabPSearch($numPageAfterCurrP)'>";
  $pagination .= "<span class='d-none d-sm-inline mr-2'>Next</span>";
  $pagination .= "<i class='icons-arrow-next icons-size-x5' aria-hidden='true'></i>";
  $pagination .= "</a>";
  $pagination .= "</li>";

  //DERNIERE PAGE
  $pagination .= "<li class='page-item page-skip $isLastP'>";
  $pagination .= "<a class='page-link' onclick='getTabPSearch($pageNb)'>";
  $pagination .= "<span class='d-none d-sm-inline mr-2'>Fin</span>";
  $pagination .= "<i class='icons-arrow-double icons-size-x5' aria-hidden='true'></i>";
  $pagination .= "</a>";
  $pagination .= "</li>";
  $pagination .= "</ul>";
  $pagination .= "</nav>";

} else {

  $pagination = "
      <nav aria-label='Page navigation example'>              
        <ul class='pagination justify-content-center'>
          <li class='page-item disabled'><a class='page-link'>Previous</a></li>
          <li class='page-item'><a class='page-link' onclick='getTabPSearch(1)'>1</a></li>
          <li class='page-item disabled'><a class='page-link'>Next</a></li>
        </ul>              
      </nav>";
}

$array = array('tabRet' => $tableau, 'pagination' => $pagination);
echo json_encode($array);

?>