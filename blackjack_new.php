<?php

$suits = ['hearts', 'spades', 'clubs', 'diamonds'];
$labels = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];
$points = [2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10, 1];

for ($i = 0; $i < 4; $i++)
{
    for($j = 0; $j < 13; $j++)
    {
        $deck[] = ['label' => $labels[$j], 'points' => $points[$j], 'suit' => $suits[$i]];
    }
}

shuffle($deck);

$card1 = array_pop($deck);
$card2 = array_pop($deck);
$card3 = array_pop($deck);
$card4 = array_pop($deck);
$card5 = array_pop($deck);
$card6 = array_pop($deck);

$displayP1Cards = "Player 1 cards: ".$card1['label']." of ".$card1['suit']
    ." and ".$card2['label']." of ".$card2['suit'];
$displayP2Cards =  "Player 2 cards: ".$card3['label']." of ".$card3['suit']
    ." and ".$card4['label']." of ".$card4['suit'];
$p1ExtraCard = " and ".$card5['label']." of ".$card5['suit'];
$p2ExtraCard = " and ".$card6['label']." of ".$card6['suit'];

$player1Score = $card1['points'] + $card2['points'];
$player2Score = $card3['points'] + $card4['points'];

function changeAcePoints ($cardA, $cardB, $score) {

    $cards = [$cardA['label'], $cardB['label']];

    if (in_array('Ace', $cards) && $score <= 21)
    {
        if ($cardA['label'] !== 'Ace' || $cardB['label'] !== 'Ace')
        {
            $score += 10;
        }
    }
    return $score;
}

$player1Score = changeAcePoints($card1, $card2, $player1Score);
$player2Score = changeAcePoints($card3, $card4, $player2Score);

if ($player1Score < 14) {
    $player1Score += $card5['points'];
        if (($card5['label'] === 'Ace' && $card1['label'] !== 'Ace') && $player1Score <= 11) {
            $player1Score += 10;
        }
    echo $displayP1Cards.$p1ExtraCard;
    while ($player1Score < 14) {
        $p1newCard = array_pop($deck);
        $player1Score += $p1newCard['points'];
        echo " and ".$p1newCard['label']." of ".$p1newCard['suit'];
    }
    echo "<br>";
    echo "Score: ".$player1Score;
} else {
    echo $displayP1Cards;
    echo "<br>";
    echo "Score: ".$player1Score;
}

echo "<br><br>";

if ($player2Score < 14) {
    $player2Score += $card6['points'];
    if (($card6['label'] === 'Ace' && $card3['label'] !== 'Ace') && $player2Score <= 11) {
        $player2Score += 10;
    }
    echo $displayP2Cards.$p2ExtraCard;
    while ($player2Score < 14) {
        $p2newCard = array_pop($deck);
        $player2Score += $p2newCard['points'];
        echo " and ".$p2newCard['label']." of ".$p2newCard['suit'];
    }
    echo "<br>";
    echo "Score: ".$player2Score;
} else {
    echo $displayP2Cards;
    echo "<br>";
    echo "Score: ".$player2Score;
}

echo "<br>";

if ($player1Score === $player2Score || ($player1Score > 21 && $player2Score > 21))
{
    echo "<br>It's a draw";
}
elseif($player1Score > 21)
{
    echo "<br>Player 2 wins";
}
elseif ($player2Score > 21)
{
    echo "<br>Player 1 wins";
}
elseif ($player1Score < $player2Score)
{
    echo "<br>Player 2 wins";
}
elseif ($player2Score < $player1Score)
{
    echo "<br>Player 1 wins";
}




































































//var_dump($deck);
//
//shuffle($deck);
//
//$card1 = array_pop($deck);
//$card2 = array_pop($deck);
//$card3 = array_pop($deck);
//$card4 = array_pop($deck);
//
//$playerOneScore = $card1['points'] + $card2['points'];
//$playerTwoScore = $card3['points'] + $card4['points'];
//
//echo "Player 1 score is ".$playerOneScore."<br>Player 2 score is ".$playerTwoScore."<br>";
//
//if ($playerOneScore == $playerTwoScore)
//{
//    echo "It's a draw";
//}
//elseif ($playerOneScore <= 21 && $playerTwoScore > 21)
//{
//    echo "Player 1 wins";
//}
//elseif ($playerTwoScore <= 21 && $playerOneScore > 21)
//{
//    echo "Player 2 wins";
//}
//elseif ($playerOneScore > $playerTwoScore)
//{
//    echo "Player 1 wins";
//}
//elseif ($playerTwoScore > $playerOneScore)
//{
//    echo "Player 2 wins";
//}
//
