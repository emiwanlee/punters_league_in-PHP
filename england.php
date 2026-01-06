<?php

include "teams.php";
include "includes/db.php";
include "includes/header.php";

// Calculate a team power score
function calculatePower($team) {
    return ($team["MW"] * 3) + ($team["MD"]) + ($team["GF"] - $team["GA"]) * 0.2;
}

// Find a team by name
function findTeam($teams, $name) {
    foreach ($teams as $t) {
        if ($t["team"] === $name) return $t;
    }
    return null;
}

// Load EPL teams
$teams = $leagues["EPL"]["teams"];

?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "leagues";   // your actual DB NAME

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<h2>EPL Table for Last Season</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th>
        <th>MP</th>
        <th>MW</th>
        <th>MD</th>
        <th>GF</th>
        <th>GA</th>
        <th>Power</th>
    </tr>

    <?php foreach ($teams as $row): ?>
        <tr>
            <td><?= $row['team'] ?></td>
            <td><?= $row['MP'] ?></td>
            <td><?= $row['MW'] ?></td>
            <td><?= $row['MD'] ?></td>
            <td><?= $row['GF'] ?></td>
            <td><?= $row['GA'] ?></td>
            <td><?= number_format(calculatePower($row), 2) ?></td>
        </tr>
    <?php endforeach; ?>
  
    <?php

    
    
  
$sql = "
    SELECT 
        team,
        MP,
        MW,
        MD,
        GF,
        GA,
        (MW * 3) + MD + ((GF - GA) * 0.2) AS power
    FROM teams
    WHERE league = 'EPL'
    ORDER BY power DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error . " — SQL: " . $sql);
}

// fetch one row for inspection (you can remove this debug block later)
$row = $result->fetch_assoc();
if (!$row) {
    die("No rows returned. (Maybe no EPL rows in teams table)");
}

// Show what columns are present (helps diagnose undefined array key)
//echo "<pre>ROW KEYS: ";
//print_r(array_keys($row));
//echo "\nROW (first): ";
//print_r($row);
echo "</pre>";

// rewind result pointer so you can loop from the start
$result->data_seek(0);

// now the safe loop to display
echo '<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th><th>MP</th><th>MW</th><th>MD</th><th>GF</th><th>GA</th><th>Power</th>
    </tr>';
echo "<br>";
echo "<h2>";
echo "Current Table";
echo "</h2>";
while ($row = $result->fetch_assoc()) {
    // avoid undefined index by using null coalescing
    $power = isset($row['power']) ? number_format($row['power'], 2) : 'N/A';
    echo "<tr>
        <td>{$row['team']}</td>
        <td>{$row['MP']}</td>
        <td>{$row['MW']}</td>
        <td>{$row['MD']}</td>
        <td>{$row['GF']}</td>
        <td>{$row['GA']}</td>
        <td>{$power}</td>
    </tr>";
}

echo "</table>";

?>
<?php


// Load EPL teams
$teams = $leagues["EnglishChampionship"]["teams"];

?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "leagues";   // your actual DB NAME

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<h2>English Championship Table for Last Season</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th>
        <th>MP</th>
        <th>MW</th>
        <th>MD</th>
        <th>GF</th>
        <th>GA</th>
        <th>Power</th>
    </tr>

    <?php foreach ($teams as $row): ?>
        <tr>
            <td><?= $row['team'] ?></td>
            <td><?= $row['MP'] ?></td>
            <td><?= $row['MW'] ?></td>
            <td><?= $row['MD'] ?></td>
            <td><?= $row['GF'] ?></td>
            <td><?= $row['GA'] ?></td>
            <td><?= number_format(calculatePower($row), 2) ?></td>
        </tr>
    <?php endforeach; ?>
 
    <?php

    
    
  
$sql = "
    SELECT 
        team,
        MP,
        MW,
        MD,
        GF,
        GA,
        (MW * 3) + MD + ((GF - GA) * 0.2) AS power
    FROM teams
    WHERE league = 'EnglishChampionship'
    ORDER BY power DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error . " — SQL: " . $sql);
}

// fetch one row for inspection (you can remove this debug block later)
$row = $result->fetch_assoc();
if (!$row) {
    die("No rows returned. (Maybe no EPL rows in teams table)");
}

// Show what columns are present (helps diagnose undefined array key)
//echo "<pre>ROW KEYS: ";
//print_r(array_keys($row));
//echo "\nROW (first): ";
//print_r($row);
echo "</pre>";

// rewind result pointer so you can loop from the start
$result->data_seek(0);

// now the safe loop to display
echo '<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th><th>MP</th><th>MW</th><th>MD</th><th>GF</th><th>GA</th><th>Power</th>
    </tr>';
echo "<br>";
echo "<h2>";
echo "Current Table";
echo "</h2>";
while ($row = $result->fetch_assoc()) {
    // avoid undefined index by using null coalescing
    $power = isset($row['power']) ? number_format($row['power'], 2) : 'N/A';
    echo "<tr>
        <td>{$row['team']}</td>
        <td>{$row['MP']}</td>
        <td>{$row['MW']}</td>
        <td>{$row['MD']}</td>
        <td>{$row['GF']}</td>
        <td>{$row['GA']}</td>
        <td>{$power}</td>
    </tr>";
}

$teams = $leagues["englishLeagueOneTeams"]["teams"];

?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "leagues";   // your actual DB NAME

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th>
        <th>MP</th>
        <th>MW</th>
        <th>MD</th>
        <th>GF</th>
        <th>GA</th>
        <th>Power</th>
    </tr>

    <?php foreach ($teams as $row): ?>
        <tr>
            <td><?= $row['team'] ?></td>
            <td><?= $row['MP'] ?></td>
            <td><?= $row['MW'] ?></td>
            <td><?= $row['MD'] ?></td>
            <td><?= $row['GF'] ?></td>
            <td><?= $row['GA'] ?></td>
            <td><?= number_format(calculatePower($row), 2) ?></td>
        </tr>
    <?php endforeach; ?>
  <h2>English League One Table for Last Season</h2>
    <?php

    
    
  
$sql = "
    SELECT 
        team,
        MP,
        MW,
        MD,
        GF,
        GA,
        (MW * 3) + MD + ((GF - GA) * 0.2) AS power
    FROM teams
    WHERE league = 'englishLeagueOneTeams'
    ORDER BY power DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error . " — SQL: " . $sql);
}

// fetch one row for inspection (you can remove this debug block later)
$row = $result->fetch_assoc();
if (!$row) {
    die("No rows returned. (Maybe no EPL rows in teams table)");
}

// Show what columns are present (helps diagnose undefined array key)
//echo "<pre>ROW KEYS: ";
//print_r(array_keys($row));
//echo "\nROW (first): ";
//print_r($row);
echo "</pre>";

// rewind result pointer so you can loop from the start
$result->data_seek(0);

// now the safe loop to display
echo '<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th><th>MP</th><th>MW</th><th>MD</th><th>GF</th><th>GA</th><th>Power</th>
    </tr>';
echo "<br>";
echo "<h2>";
echo "Current Table";
echo "</h2>";
while ($row = $result->fetch_assoc()) {
    // avoid undefined index by using null coalescing
    $power = isset($row['power']) ? number_format($row['power'], 2) : 'N/A';
    echo "<tr>
        <td>{$row['team']}</td>
        <td>{$row['MP']}</td>
        <td>{$row['MW']}</td>
        <td>{$row['MD']}</td>
        <td>{$row['GF']}</td>
        <td>{$row['GA']}</td>
        <td>{$power}</td>
    </tr>";
}


$teams = $leagues["englishLeagueTwoTeams"]["teams"];

?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "leagues";   // your actual DB NAME

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th>
        <th>MP</th>
        <th>MW</th>
        <th>MD</th>
        <th>GF</th>
        <th>GA</th>
        <th>Power</th>
    </tr>

    <?php foreach ($teams as $row): ?>
        <tr>
            <td><?= $row['team'] ?></td>
            <td><?= $row['MP'] ?></td>
            <td><?= $row['MW'] ?></td>
            <td><?= $row['MD'] ?></td>
            <td><?= $row['GF'] ?></td>
            <td><?= $row['GA'] ?></td>
            <td><?= number_format(calculatePower($row), 2) ?></td>
        </tr>
    <?php endforeach; ?>
  <h2>English League Two Table for Last Season</h2>
    <?php

    
    
  
$sql = "
    SELECT 
        team,
        MP,
        MW,
        MD,
        GF,
        GA,
        (MW * 3) + MD + ((GF - GA) * 0.2) AS power
    FROM teams
    WHERE league = 'englishLeagueTwoTeams'
    ORDER BY power DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error . " — SQL: " . $sql);
}

// fetch one row for inspection (you can remove this debug block later)
$row = $result->fetch_assoc();
if (!$row) {
    die("No rows returned. (Maybe no EPL rows in teams table)");
}

// Show what columns are present (helps diagnose undefined array key)
//echo "<pre>ROW KEYS: ";
//print_r(array_keys($row));
//echo "\nROW (first): ";
//print_r($row);
echo "</pre>";

// rewind result pointer so you can loop from the start
$result->data_seek(0);

// now the safe loop to display
echo '<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Team</th><th>MP</th><th>MW</th><th>MD</th><th>GF</th><th>GA</th><th>Power</th>
    </tr>';
echo "<br>";
echo "<h2>";
echo "Current Table";
echo "</h2>";
while ($row = $result->fetch_assoc()) {
    // avoid undefined index by using null coalescing
    $power = isset($row['power']) ? number_format($row['power'], 2) : 'N/A';
    echo "<tr>
        <td>{$row['team']}</td>
        <td>{$row['MP']}</td>
        <td>{$row['MW']}</td>
        <td>{$row['MD']}</td>
        <td>{$row['GF']}</td>
        <td>{$row['GA']}</td>
        <td>{$power}</td>
    </tr>";
}

echo "</table>";
?>
<?php include "includes/footer.php"; ?>

</body>
</html>
