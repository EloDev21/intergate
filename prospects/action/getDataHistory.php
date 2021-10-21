<?php 
    require_once('../database.php');

    function getNameManager($idManager) {
        $pdo = getConnexion();
        $stmt = $pdo->prepare("SELECT first_name FROM MANAGERS WHERE id = ?");
        $stmt->execute([$idManager]); 
        $data = $stmt->fetch();
        return (isset($data['first_name'])) ? $data['first_name'] : "?";
    }

    $id = $_POST['idProspect'];

    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM TRACKING WHERE id_prospect = ? ORDER BY id_tracking DESC");
    $stmt->execute([$id]); 
    $data = $stmt->fetchAll();
    
    if($stmt->rowCount() == 0) {
        $tableau = "<p>There is no history with this prospect. Maybe is it the moment to start one?</p>";
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
                <td>".$row['commentT']."</td>
            </tr>";
    }

    $tableau .= "
        </tbody>
    </table>";    

    $array = array('tab' => $tableau);
    echo json_encode($array);
?>