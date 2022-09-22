<?php

class FixturesHtml extends DisplayHtml
{

public function displayFixtures($boulesFixtures)
{
    $html = "";
    foreach($boulesFixtures as $boulesFixture)
    {

        unset($gameResults); unset($teamHomeBorder); unset($teamAwayBorder);

        $homeTeam = "Team1";
        $awayTeam = "Team2";
        // Check if either teams are a BY (0)
if ($boulesFixture["boulesFixture_home"] == 0) { $homeTeam = "BY"; }
if ($boulesFixture["boulesFixture_away"] == 0) { $awayTeam = "BY"; }

if ($boulesFixture["boulesFixture_home"] != 0 && $boulesFixture["boulesFixture_away"] != 0) {
    if ($boulesFixture["boulesFixture_win"] == $boulesFixture["boulesFixture_home"]) { $teamHomeBorder = " win"; $teamAwayBorder = " loss"; }
    if ($boulesFixture["boulesFixture_win"] == $boulesFixture["boulesFixture_away"]) { $teamHomeBorder = " loss"; $teamAwayBorder = " win"; }
    }

    $html .= '<div class="venueborder">
    <div class="venue">'.$homeTeam.'</div>
    </div>
    <div class="venuelegbox">
    <div class="venuelegs">
    <div class="l"></div>
    <div class="r"></div>
    </div>
    </div>
    <div class="box">
    <div class="teamborder'.$teamHomeBorder.'" style="cursor: auto;">
    <div class="teamname" style="cursor: auto;">'.$homeTeam.'</div>
    </div>
    <div class="boulesborder" style="margin: 0px 6px;">
    <div class="boule">VS</div>
    </div>
    <div class="teamborder'.$teamAwayBorder.'" style="cursor: auto;">
    <div class="teamname" style="cursor: auto;">'.$awayTeam.'</div>
    </div>
    </div>';

    }

return $html;

}


}




?>