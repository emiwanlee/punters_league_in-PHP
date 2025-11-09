<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b274edf26f.js" crossorigin="anonymous"></script>
   <title> Soccer prediction guide</title>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TZFW1TD8TC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TZFW1TD8TC');
</script>
 <link rel="stylesheet" href="css/style.css">
<!--<link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">-->
    <script src="https://kit.fontawesome.com/b274edf26f.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/bmp" href="images/logo.bmp">
</head>
<body data-league="epl">
<header>
<nav class="navbar">
<a href="#" class="nav-branding">Blog</a>

<ul class="nav-menu">
<li class="nav-item">
<a href="#" class="nav-link">England</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">Spain</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">Italy</a>
</li>
</ul>
<div class="hamburger">
<span class="bar"></span>
<span class="bar"></span>
<span class="bar"></span> 
</div>
</nav>

</header>


<?php
include "includes/db.php";

// fetch all posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<section style='max-width:800px; margin:40px auto;'>";
echo "<h2 style='text-align:center;'>Latest Blog Posts</h2>";

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

echo "</section>";

$conn->close();
?>


<?php
//bring in the teams data
include "teams.php";
include "last.php";
?>
    <?php
// include fixtures.php to load $title and $fixtures
include "fixtures.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--
    <h1><?php echo $title; ?></h1>
    <p>Here are this weekend’s matches:</p>

    <ul>
-->

       <?php
	   echo "<h2> Thats the way it is</h2>";
// function to calculate power score
function calculatePower($team) {
    return ($team["MW"] * 3) + ($team["MD"]) + ($team["GF"] - $team["GA"]) * 0.2;
}

// loop through each league
foreach ($leagues as $leagueName => $leagueData) {
    $teams = $leagueData["teams"];
    $fixtures = $leagueData["fixtures"];

	echo "<div class='main-item'>";
	echo "<div class='item'>";
	echo "<div class='table-responsive'>";
    echo "<h2>$leagueName</h2>";
    echo "<table border='0' cellpadding='0'>";
    echo "<tr><th>Home</th><th>Away</th><th>Home Power</th><th>Away Power</th><th>Prediction</th></tr>";
	echo "</div>";
	echo "</div>";
	echo "<div class='item'>";
	echo "<h3>";
	echo $LatestResults;
	echo "</h3>";
	
	if (isset($lastMatches[$leagueName])) {
    echo "<h3>Last Match Results</h3>";
    echo "<ul>";

    foreach ($lastMatches[$leagueName] as $match) {
        echo "<li>{$match['home']} {$match['home_score']} - {$match['away_score']} {$match['away']}</li>";
    }

    echo "</ul>";
} else {
    echo "<p><em>No last match data for this league yet.</em></p>";
}

	
//foreach ($results as $leagueName => $matches) {
   // echo "<h2>$leagueName</h2>"; // prints EPL as a heading

  //  echo "<ul>"; // start a list
  //  foreach ($matches as $match) {
       // echo "<li>$match</li>"; // print each match as a list item
 //   }
 //   echo "</ul>"; // end the list
//}
	
	

    echo "</div>";

	


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
}

?>


  <div class="footer">
        
  <p><strong>Punters League</strong> is your go-to platform for football predictions and stats.</p>

  <ul class="footer-links">
    
    <li><a href="{% url 'about' %}">About</a></li>
    <li><a href="{% url 'posts:posts_list' %}">Blog</a></li>
    <li><a href="{% url 'contact' %}">Contact</a></li>
    <li><a href="{% url 'privacy' %}">Privacy Policy</a></li>
    <li><a href="{% url 'terms' %}">Terms and Conditions</a></li>
  </ul>

  <form class="newsletter-form">
    <label for="newsletter-email">Subscribe:</label><br>
    <input type="email" id="newsletter-email" placeholder="Email address">
    <button type="submit">Subscribe</button>
  </form>

  <p>Follow us on:</p>
  <div class="social-icons">
    <a href="https://facebook.com/profile.php?id=61579007960417" target="_blank"><img src="images/facebookicon.png" alt="Facebook"></a>
    <a href="https://x.com/PuntersLeague1" target="_blank"><img src="images/xicon.png" alt="X"></a>
    <a href="https://www.youtube.com/channel/UClNp2eY92X1psjFR2cP-Rnw" target="_blank" target="_blank"><img src="images/youtube-image.png" alt="YouTube"></a>
  </div>

  <p class="disclaimer">Disclaimer: Predictions are for entertainment only. Gamble responsibly. 18+</p>
 <p>Email: admin@puntersblog.com</p>
  <p>&copy; 2025 Punters League. All rights reserved.</p>
</div>

<script src="js/script.js"></script>
<script src="js/date1.js/"></script>
<script src="js/script2.js"></script>
<script src="js/script3.js"></script>
</body>
</html>
</body>
</html>

