<?php 
chdir('../');
require_once('./services/connectDb.php');
$url = 'http://localhost/annuaire/?q=lausson';
$result_http = get_headers($url)[0];
echo $result_http;


function verifnb($letters, $nb) {
    $connectDbTest = new Database();
    $sqltest = "SELECT COUNT(id) FROM student WHERE nom LIKE '%$letters%'";
    $req = $connectDbTest->connection->prepare($sqltest);
    $req->execute();
    $resultatTest = $req->fetchAll(PDO::FETCH_ASSOC);

    if ( $resultatTest[0]["COUNT(id)"] == $nb ) {
        echo "pass ! ";
    } else {
        echo "error ! ";
    }
    }
    verifnb('lausson', 2);
?>