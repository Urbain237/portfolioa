<?php 
    if(isset($_POST['reserver'])){
        $conn = new mysqli("localhost", "root", "", "aeroport");
        if(conn->connect_error){
            die("connexion échoué : ". $conn->connect_error);
        }
        $nom = $conn->real_escape_string($_POST[nom]);
        $email = $conn->real_escape_string($_POST[email]);
        $date = $conn->real_escape_string($_POST[date]);
        $destination = $conn->real_escape_string($_POST[destination]);
        $passagers = (int) $_POST['passagers'];
        $sql = "INSERT INTO reservations (nom, email, date_depart, destination, passagers) VALUES ('$nom', '$email', '$destination', '$passagers')";
        if($conn->query($sql) === TRUE){
            echo "<p class='succes'>Réservation faite avec succes !</p>"

        } else {
            echo "<p class='error'>Erreur :" . $conn->error ."</p>";
        }
        $conn->close();
    }
    ?>