
<?php
// Dane do połączenia z Twoją bazą z phpMyAdmina
$host = "localhost";
$username = "43934480_merelekpl"; // Nazwa Twojego użytkownika (często taka sama jak baza)
$password = "TUTAJ_WPISZ_SWOJE_HASLO"; // Hasło, którym logujesz się do bazy
$dbname = "43934480_merelekpl";

// 1. Łączymy się z bazą danych
$conn = new mysqli($host, $username, $password, $dbname);

// Sprawdzamy czy połączenie się powiodło
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// 2. PRZYKŁAD ZAPISU: Dodajemy nowego gracza do bazy
$sql_insert = "INSERT INTO gracze (imie, fakt1, punkty) VALUES ('Michał', 'Skakałem ze spadochronem', 10)";
if ($conn->query($sql_insert) === TRUE) {
    echo "<h3>Dodano nowego gracza do bazy!</h3>";
}

// 3. PRZYKŁAD ODCZYTU: Wyciągamy wszystkich graczy z bazy i wyświetlamy
echo "<h3>Lista graczy w bazie:</h3>";
$sql_select = "SELECT * FROM gracze";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " | Imię: " . $row["imie"]. " | Fakt: " . $row["fakt1"]. " | Punkty: " . $row["punkty"] . "<br>";
    }
} else {
    echo "Brak graczy w bazie.";
}

// Zamykamy połączenie
$conn->close();
?>
