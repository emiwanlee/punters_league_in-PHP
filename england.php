<?php

include "teams.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>England</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>












<?php

$leagueKeys = array_keys($leagues); // Get all league names
$firstLeague = $leagueKeys[0];      // Pick the first one
$leagueName = $firstLeague;
$teams = $leagues[$leagueName]["teams"];

echo "<h2>$leagueName - League Table</h2>";
echo "<table border='0' cellpadding='0'>";
echo "<tr><th>Team</th><th>MP</th><th>MW</th><th>MD</th><th>ML</th><th>GF</th><th>GA</th><th>GD</th><th>Points</th><th>Power %</th></tr>";

foreach ($teams as $row) {
    echo "<tr>
        <td>{$row["team"]}</td>
        <td>{$row["MP"]}</td>
        <td>{$row["MW"]}</td>
        <td>{$row["MD"]}</td>
        <td>" . ($row["MP"] - $row["MW"] - $row["MD"]) . "</td>
        <td>{$row["GF"]}</td>
        <td>{$row["GA"]}</td>
        <td>" . ($row["GF"] - $row["GA"]) . "</td>
        <td>" . (($row["MW"] * 3) + $row["MD"]) . "</td>
        <td>" . round((($row["MW"] / $row["MP"]) * 100), 2) . "%</td>
    </tr>";
}

echo "</table><br>";
//echo "</div>";



/*
// function to calculate power score
function calculatePower($team) {
    return ($team["MW"] * 3) + ($team["MD"]) + ($team["GF"] - $team["GA"]) * 0.2;
}

// loop through each league
foreach ($leagues as $leagueName => $leagueData) {
    $teams = $leagueData["teams"];
   // $fixtures = $leagueData["fixtures"];
}


echo "<div class='main-item'>";
	echo "<div class='item'>";
	echo "<div class='table-responsive'>";
   // echo "<h2>$leagueName - Fixture Predictions</h2>";
    echo "<table border='0' cellpadding='0'>";
   // echo "<tr><th>Home</th><th>Away</th><th>Home Power</th><th>Away Power</th><th>Prediction</th></tr>";
	echo "</div>";
	echo "</div>";
	echo "<div class='item'>";
//echo "<h3>";
//echo $LatestResults;
	//echo "</h3>";
	
	 echo "</div>";

	

/*
    foreach ($fixtures as $fixture) {
        list($home, $away) = $fixture;

        $homeTeam = null;
        $awayTeam = null;

        // find home and away teams in the teams list
        foreach ($teams as $t) {
            if ($t["team"] === $home) $homeTeam = $t;
            if ($t["team"] === $away) $awayTeam = $t;
        }

        if (!$homeTeam || !$awayTeam) continue;

        // calculate power
        $homePower = calculatePower($homeTeam) + 10; // +10 bonus for home
        $awayPower = calculatePower($awayTeam);

        $diff = $homePower - $awayPower;
        $prediction = "X (Draw)";
        if ($diff >= 10) {
            $prediction = "1 (Home Win)";
        } elseif ($diff >= 5) {
            $prediction = "1X (Home Win or Draw)";
        } elseif ($diff <= -10) {
            $prediction = "2 (Away Win)";
        } elseif ($diff <= -5) {
            $prediction = "X2 (Away Win or Draw)";
        }

        echo "<tr>";
        echo "<td>{$home}</td>";
        echo "<td>{$away}</td>";
        echo "<td>" . number_format($homePower, 2) . "</td>";
        echo "<td>" . number_format($awayPower, 2) . "</td>";
        echo "<td>{$prediction}</td>";
        echo "</tr>";
    }

    echo "</table><br>";

*/
// calculate stats for each team
foreach ($teams as $key => $t) {
    $ML = $t["MP"] - ($t["MW"] + $t["MD"]);
    $GD = $t["GF"] - $t["GA"];
    $points = $t["MW"] * 3 + $t["MD"];
    $power = ($points / ($t["MP"] * 3)) * 100;

    $teams[$key]["ML"] = $ML;
    $teams[$key]["GD"] = $GD;
    $teams[$key]["points"] = $points;
    $teams[$key]["power"] = round($power, 2);
}

// sort league table by points
usort($teams, function($a, $b) {
    if ($a['points'] == $b['points']) {
        return $b['GD'] <=> $a['GD'];
    }
    return $b['points'] <=> $a['points'];
});
/*
// display table
echo "<h2>$leagueName - League Table</h2>";
echo "<table border='0' cellpadding='0'>";
echo "<tr><th>Team</th><th>MP</th><th>MW</th><th>MD</th><th>ML</th><th>GF</th><th>GA</th><th>GD</th><th>Points</th><th>Power %</th></tr>";
foreach ($teams as $row) {
    echo "<tr>
        <td>{$row["team"]}</td>
        <td>{$row["MP"]}</td>
        <td>{$row["MW"]}</td>
        <td>{$row["MD"]}</td>
        <td>{$row["ML"]}</td>
        <td>{$row["GF"]}</td>
        <td>{$row["GA"]}</td>
        <td>{$row["GD"]}</td>
        <td>{$row["points"]}</td>
        <td>{$row["power"]}%</td>
    </tr>";
}
echo "</table><br>";
echo "</div>";
*/
	
// calculate stats for each team
foreach ($teams as $key => $t) {
    $ML = $t["MP"] - ($t["MW"] + $t["MD"]);
    $GD = $t["GF"] - $t["GA"];
    $points = $t["MW"] * 3 + $t["MD"];
    $power = ($points / ($t["MP"] * 3)) * 100;

    $teams[$key]["ML"] = $ML;
    $teams[$key]["GD"] = $GD;
    $teams[$key]["points"] = $points;
    $teams[$key]["power"] = round($power, 2);
}

// sort league table by points
usort($teams, function($a, $b) {
    if ($a['points'] == $b['points']) {
        return $b['GD'] <=> $a['GD'];
    }
    return $b['points'] <=> $a['points'];
});

?>