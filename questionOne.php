<?php

// Create 14 players with random ratings
$players = array();
for ($i = 1; $i <= 14; $i++) {
    $player = "Player " . $i;
    $rating = rand(1, 10);
    $players[] = array($player, $rating);
}

// Shuffle the players randomly
shuffle($players);

// Divide the players into two teams
$team1 = array_slice($players, 0, 7);
$team2 = array_slice($players, 7);

// Check if the sum of ratings is equal for both teams
while (array_sum(array_column($team1, 1)) != array_sum(array_column($team2, 1))) {
    // If not, swap a player from team1 with a player from team2
    $player1 = $team1[array_rand($team1)];
    $player2 = $team2[array_rand($team2)];
    $key1 = array_search($player1, $team1);
    $key2 = array_search($player2, $team2);
    $team1[$key1] = $player2;
    $team2[$key2] = $player1;
}

// Print the teams and their total ratings
echo "\nFirst team:\n";
echo "Player Name : Rating:\n";
foreach ($team1 as $player) {
    echo $player[0] . ":    " . $player[1] . "\n";
}
echo "The sum of the first team is: " . array_sum(array_column($team1, 1)) . "\n";

echo "\nSecond team:\n";
echo "Player Name : Rating:\n";
foreach ($team2 as $player) {
    echo $player[0] . ":    " . $player[1] . "\n";
}
echo "The sum of the second team is: " . array_sum(array_column($team2, 1)) . "\n";

?>