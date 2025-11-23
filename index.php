<?php
include "teams.php";
include "last.php";
include "fixtures.php";
include "includes/db.php";

// Function to calculate team power
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Soccer Prediction Guide</title>
<!-- Google Tag -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TZFW1TD8TC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TZFW1TD8TC');
</script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">
<script src="https://kit.fontawesome.com/b274edf26f.js" crossorigin="anonymous"></script>
<link rel="icon" type="image/bmp" href="images/logo.bmp">
</head>
<body data-league="epl">

<header>
<nav class="navbar"> <a href="#" class="nav-branding">Blog</a> <ul class="nav-menu"> <li class="nav-item"> <a href="#" class="nav-link">England</a> </li> <li class="nav-item"> <a href="#" class="nav-link">Spain</a> </li> <li class="nav-item"> <a href="#" class="nav-link">Italy</a> </li> </ul> <div class="hamburger"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </div> </nav>
</header>
<div class="logo-container">
    <img src="images/web-logo.png" alt="Website Logo" width="150" height="150">
</div>

<div class="social-icons" style="display:flex; justify-content:center; gap:10px;">
<a href="https://facebook.com/profile.php?id=61579007960417" target="_blank"><img src="images/facebookicon.png" alt="Facebook" width="30"></a>
<a href="https://x.com/PuntersLeague1" target="_blank"><img src="images/xicon.png" alt="X" width="30"></a>
<a href="https://www.youtube.com/channel/UClNp2eY92X1psjFR2cP-Rnw" target="_blank"><img src="images/youtube-image.png" alt="YouTube" width="30"></a>
</div>
<div class="time" style="display:flex; justify-content:center; gap:10px;">
<p id="time"></p>
</div>
<main style="max-width:1200px; margin:auto; padding:20px;">
<?php
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
        echo "</div>";
    }
}
?>
</main>


<!-- Blog Posts Section -->
<section style="max-width:800px; margin:40px auto;">
<h2 style="text-align:center;">Latest Blog Posts</h2>
<?php
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($post = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ddd; padding:15px; margin-bottom:20px; border-radius:10px;'>";
        echo "<h3>" . htmlspecialchars($post['title']) . "</h3>";
        echo "<p>" . nl2br(substr($post['content'], 0, 250)) . "...</p>";
        echo "<small>By " . htmlspecialchars($post['author']) . " | " . $post['created_at'] . "</small><br>";
        echo "</div>";
    }
} else {
    echo "<p>No blog posts yet.</p>";
}

$conn->close();
?>
</section>

<!-- Footer -->
<footer class="footer" style="text-align:center; padding:30px; margin-top:50px;">
<p><strong>Punters League</strong> is your go-to platform for football predictions and stats.</p>
<ul style="list-style:none; padding:0; display:flex; justify-content:center; gap:15px;">
<li><a href="#">About</a></li>
<li><a href="#">Blog</a></li>
<li><a href="#">Contact</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms</a></li>
</ul>
<p>Follow us on:</p>
<div class="social-icons" style="display:flex; justify-content:center; gap:10px;">
<a href="https://facebook.com/profile.php?id=61579007960417" target="_blank"><img src="images/facebookicon.png" alt="Facebook" width="30"></a>
<a href="https://x.com/PuntersLeague1" target="_blank"><img src="images/xicon.png" alt="X" width="30"></a>
<a href="https://www.youtube.com/channel/UClNp2eY92X1psjFR2cP-Rnw" target="_blank"><img src="images/youtube-image.png" alt="YouTube" width="30"></a>
</div>
<p class="disclaimer">Disclaimer: Predictions are for entertainment only. Gamble responsibly. 18+</p>
<p>Email: admin@puntersblog.com</p>
<p>&copy; 2025 Punters League. All rights reserved.</p>
</footer>

<script src="js/script.js"></script>
<script src="js/date1.js"></script>
<script src="js/script2.js"></script>
<script src="js/script3.js"></script>

</body>
</html>
