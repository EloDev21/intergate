<?php 
    require_once('../database.php');
    $id = $_POST['idProspect'];

    function getNameManager($idManager) {
        $pdo = getConnexion();
        $stmt = $pdo->prepare("SELECT first_name FROM MANAGERS WHERE id = ?");
        $stmt->execute([$idManager]); 
        $data = $stmt->fetch();
        return (isset($data['first_name'])) ? $data['first_name'] : "?";
    }

    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM OFFER WHERE id_prospect = ? ORDER BY id DESC");
    $stmt->execute([$id]); 
    $data = $stmt->fetchAll();
    
    if($stmt->rowCount() == 0) {
        $tableau = "<p>There is no history of offers with this prospect.<br><br>Maybe is it the moment to make one?</p>";
        $array = array('tab' => $tableau);
        echo json_encode($array);
        exit();
    }

    $tabHead = "
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope='col'>Date</th>
                <th scope='col'>Manager</th>
                <th scope='col'>From</th>
                <th scope='col'>To</th>
                <th scope='col'>Offer</th>
                <th scope='col'>Comment</th>
            </tr>
        </thead>
        <tbody>";

    $tableau = $tabHead;
    
    foreach ($data as $row) {
        $tableau .= "
            <tr>
                <td>".$row['creation']."</td>
                <td>".getNameManager($row['actor'])."</td>
                <td>".$row['cityFrom']."</td>
                <td>".$row['cityTo']."</td>
                <td>".$row['offer']."</td>
                <td>".$row['commentO']."</td>
            </tr>";
    }

    $tableau .= "
        </tbody>
    </table>";    

    $array = array('tab' => $tableau);
    echo json_encode($array);
?>