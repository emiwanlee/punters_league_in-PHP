<?php
// Function to calculate team power
//function calculatePower($team) {
  //  return ($team["MW"] * 3) + ($team["MD"]) + ($team["GF"] - $team["GA"]) * 0.2;
//}

// Function to find a team by name
//function findTeam($teams, $name) {
   // foreach ($teams as $t) {
     //   if ($t["team"] === $name) return $t;
  //  }
  //  return null;
//}
?>
<?php include "includes/header.php"; ?>

<div class="time" style="display:flex; justify-content:center; gap:10px;">
<p id="time"></p>
</div>
<main style="max-width:1200px; margin:auto; padding:20px;">
<?php

$leaguePages = [
    "English Premier League" => "england.php",
    "Spanish La Liga" => "spain.php",
    "German Bundesliga" => "germany.php",
    "Italian Serie A" => "italy.php",
    "French Ligue 1" => "france.php",
    // Add more leagues here
];

foreach ($leagues as $leagueName => $leagueData) {

    $teams = $leagueData["teams"];
    $fixtures = $leagueData["fixtures"];

    echo "<h2 style='margin-bottom:20px;'>$leagueName - Predictions</h2>";

    // RIGHT SIDE - Last Match Results
    echo "<div class='item' style='margin-bottom:30px;'>";
    echo "<h3>Last Match Results</h3>";
    if (isset($lastMatches[$leagueName])) {
        echo "<ul>";
        foreach ($lastMatches[$leagueName] as $match) {
            echo "<li>{$match['home']} {$match['home_score']} - {$match['away_score']} {$match['away']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p><em>No last match data for this league yet.</em></p>";
    }
    echo "</div>";

    // ONLY THE NEW TABLE (BTTS + OVER 2.5 + POWER)
   
    $page = isset($leaguePages[$leagueName]) ? $leaguePages[$leagueName] : "#";

echo "<h2><a href='$page' style='text-decoration:none;'>$leagueName</a></h2>";
  #  echo "<h2>$leagueName</h2>";
    foreach ($fixtures as $fixture) {
        list($home, $away) = $fixture;

        $homeTeam = findTeam($teams, $home);
        $awayTeam = findTeam($teams, $away);

        if (!$homeTeam || !$awayTeam) continue;

        $homePower = calculatePower($homeTeam) + 7;
        $awayPower = calculatePower($awayTeam);

        $diff = $homePower - $awayPower;

        $prediction = "X (Draw)";
        if ($diff >= 10) $prediction = "1 (Home Win)";
        elseif ($diff >= 5) $prediction = "1X (Home Win or Draw)";
        elseif ($diff <= -10) $prediction = "2 (Away Win)";
        elseif ($diff <= -5) $prediction = "X2 (Away Win or Draw)";

        // Avoid division by zero
        $homeAvg = ($homeTeam["MP"] > 0) ? $homeTeam["GF"] / $homeTeam["MP"] : 0;
        $awayAvg = ($awayTeam["MP"] > 0) ? $awayTeam["GF"] / $awayTeam["MP"] : 0;

        $homeLikely = ($homeAvg >= 1);
        $awayLikely = ($awayAvg >= 1);
        $btts = ($homeLikely && $awayLikely) ? "BTTS" : "No BTTS";

        $over25 = ($homeAvg + $awayAvg >= 3.0) ? "Likely Over 2.5" : "Unlikely";
       
        echo "<div class='item'>";
        
        echo "<div class='table-responsive'>";

        echo "<table border='1' cellpadding='3'>";
        echo "<tr>
                <th>Home</th>
                <th>Away</th>
                <th>H Power</th>
                <th>A Power</th>
                <th>Prediction</th>
                <th>BTTS</th>
                <th>O/U 2.5</th>
              </tr>";
        echo "<tr>";
        echo "<td>{$home}</td>";
        echo "<td>{$away}</td>";
        echo "<td>" . number_format($homePower, 1) . "</td>";
        echo "<td>" . number_format($awayPower, 1) . "</td>";
        echo "<td>{$prediction}</td>";
        echo "<td>{$btts}</td>";
        echo "<td>{$over25}</td>";
        echo "</tr>";
        echo "</table>";

        echo "</div>";
        echo "</div>";
    }
}// Function to calculate team power
function calculatePower($team) {
    return ($team["MW"] * 3) + ($team["MD"]) + ($team["GF"] - $team["GA"]) * 0.2;
}

// Function to find a team by name
function findTeam($teams, $name) {
    foreach ($teams as $t) {
        if ($t["team"] === $name) return $t;
    }
    return null;
}
?>
<!--
<//?php include "includes/header.php"; ?>

<div class="time" style="display:flex; justify-content:center; gap:10px;">
<p id="time"></p>
</div>
<main style="max-width:1200px; margin:auto; padding:20px;">
<//?php
/*
foreach ($leagues as $leagueName => $leagueData) {

    $teams = $leagueData["teams"];
    $fixtures = $leagueData["fixtures"];

    echo "<h2 style='margin-bottom:20px;'>$leagueName - Predictions</h2>";

    // RIGHT SIDE - Last Match Results
    echo "<div class='item' style='margin-bottom:30px;'>";
    echo "<h3>Last Match Results</h3>";
    if (isset($lastMatches[$leagueName])) {
        echo "<ul>";
        foreach ($lastMatches[$leagueName] as $match) {
            echo "<li>{$match['home']} {$match['home_score']} - {$match['away_score']} {$match['away']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p><em>No last match data for this league yet.</em></p>";
    }
    echo "</div>";

    // ONLY THE NEW TABLE (BTTS + OVER 2.5 + POWER)
    echo "<h2>$leagueName</h2>";
    foreach ($fixtures as $fixture) {
        list($home, $away) = $fixture;

        $homeTeam = findTeam($teams, $home);
        $awayTeam = findTeam($teams, $away);

        if (!$homeTeam || !$awayTeam) continue;

        $homePower = calculatePower($homeTeam) + 7;
        $awayPower = calculatePower($awayTeam);

        $diff = $homePower - $awayPower;

        $prediction = "X (Draw)";
        if ($diff >= 10) $prediction = "1 (Home Win)";
        elseif ($diff >= 5) $prediction = "1X (Home Win or Draw)";
        elseif ($diff <= -10) $prediction = "2 (Away Win)";
        elseif ($diff <= -5) $prediction = "X2 (Away Win or Draw)";

        // Avoid division by zero
        $homeAvg = ($homeTeam["MP"] > 0) ? $homeTeam["GF"] / $homeTeam["MP"] : 0;
        $awayAvg = ($awayTeam["MP"] > 0) ? $awayTeam["GF"] / $awayTeam["MP"] : 0;

        $homeLikely = ($homeAvg >= 1);
        $awayLikely = ($awayAvg >= 1);
        $btts = ($homeLikely && $awayLikely) ? "BTTS" : "No BTTS";

        $over25 = ($homeAvg + $awayAvg >= 3.0) ? "Likely Over 2.5" : "Unlikely";
       
        echo "<div class='item'>";
        
        echo "<div class='table-responsive'>";

        echo "<table border='1' cellpadding='3'>";
        echo "<tr>
                <th>Home</th>
                <th>Away</th>
                <th>H Power</th>
                <th>A Power</th>
                <th>Prediction</th>
                <th>BTTS</th>
                <th>O/U 2.5</th>
              </tr>";
        echo "<tr>";
        echo "<td>{$home}</td>";
        echo "<td>{$away}</td>";
        echo "<td>" . number_format($homePower, 1) . "</td>";
        echo "<td>" . number_format($awayPower, 1) . "</td>";
        echo "<td>{$prediction}</td>";
        echo "<td>{$btts}</td>";
        echo "<td>{$over25}</td>";
        echo "</tr>";
        echo "</table>";

        echo "</div>";
        echo "</div>";-->
        
    }
}
*/
