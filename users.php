<?php
// Database connection parameters
$servername = '';
$username = '';
$password = '';
$dbname = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM Lecteurs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 100px;">Nom du Lecteur</th>';
    echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 100px;">Date De Naissance</th>';
    echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 15px; width: 300px;">Adresse</th>'; // Adjust width as needed
    echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Livre Emprunté</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="border: 1px solid #dddddd; padding: 8px;">' . $row["nom_lecteur"] . '</td>';
        echo '<td style="border: 1px solid #dddddd; padding: 8px;">' . $row["date_naissance"] . '</td>';
        echo '<td style="border: 1px solid #dddddd; padding: 8px;">' . $row["adress"] . '</td>';
        echo '<td style="border: 1px solid #dddddd; padding: 8px;">' . $row["livre_emprunte"] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 results";
}



$conn->close();
?>
