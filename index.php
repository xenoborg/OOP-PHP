<?php

spl_autoload_register(function ($class) 
{
    if (str_contains($class, 'Interface')) 
    {
        $prefix = 'interfaces/';
    }
    else if (str_contains($class, 'Trait')) 
    {
        $prefix = 'traits/';
    }
    else {
        $prefix = 'classes/';
    }
    require_once($prefix.$class.'.php');
});


$database = new DbController(new PdoDb(new DbConnection1()));
$sqlBuilder = new PdoMysqlSql();
//$result = $database->db->dbQuery($database->sql->clearSql()->tableSql('boulesteams')->selectSql('boulesTeam_name')->statementSql());

//print_r($database->db->dbqueryResult($result));



//print_r($database->executeQuery($boulesNews->getBoulesNews(3)));
//print_r($boulesNews->getBoulesNews(3));

//$validate = new validate();


//$selectBox = new selectBoxHtml('testbox','class1','division');

//echo $selectBox->divisionsSelectBox(3);




//$selectBox = new selectBoxHtml('testbox2','class1','seasons');

//echo $selectBox->seasonsSelectBox(2022, $seasons->getBoulesSeasons());

$testArray = ['Test 1','Test 2','Test 3'];
$testString = "This is some test string";

$boulesDivisions = new BoulesDivisions($sqlBuilder);
//$result = $boulesDivisions->insertBoulesDivisions($testArray);
//$result = $boulesDivisions->updateBoulesDivisions($testArray, 1);
//$result = $boulesDivisions->getBoulesDivisions(1,2,3,4);

$boulesFixtures = new BoulesFixtures($sqlBuilder);
//$result = $boulesFixtures->insertBoulesFixtures($testArray);
//$result = $boulesFixtures->updateBoulesFixtures($testArray, 1);
//$result = $boulesFixtures->updateWin($testArray, 1);
//$result = $boulesFixtures->getBoulesFixtures(1,2,3,4,5,6,0);

$boulesGames = new boulesGames($sqlBuilder);
//$result = $boulesGames->insertBoulesGames($testArray);
//$result = $boulesGames->updateScore($testArray, 1);

$boulesKnockouts = new BoulesKnockouts($sqlBuilder);
//$result = $boulesKnockouts->insertBoulesKnockouts($testArray);
//$result = $boulesKnockouts->updateBoulesKnockouts($testArray, 1);
//$result = $boulesKnockouts->getBoulesKnockouts(1,2,3);

$boulesNews = new BoulesNews($sqlBuilder);
//$result = $boulesNews->insertBoulesNews($testString);
//$result = $boulesNews->updateBoulesNews($testString, 1);
//$result = $boulesNews->getBoulesNews(1,2,3);

$boulesRules = new BoulesRules($sqlBuilder);
//$result = $boulesRules->editBoulesRules($testString, 1);
//$result = $boulesRules->getBoulesRules(1);

$boulesSeasons = new BoulesSeasons($sqlBuilder);
//$result = $boulesSeasons->insertBoulesSeasons($testArray);
//$result = $boulesSeasons->updateBoulesSeasons($testArray, 1);
//$result = $boulesSeasons->getBoulesSeasons(1);

$boulesTeams = new BoulesTeams($sqlBuilder);
//$result = $boulesTeams->insertBoulesTeams($testArray);
//$result = $boulesTeams->updateBoulesTeams($testArray, $boulesTeamID);
//$result = $boulesTeams->getBoulesSeasons(1);

$boulesVenues = new BoulesVenues($sqlBuilder);
//$result = $boulesVenues->insertBoulesVenues($testArray);
//$result = $boulesVenues->updateBoulesVenues($testArray, $boulesVenueID);
//$result = $boulesVenues->getBoulesSeasons(1);

$html = new DisplayHtml();



//echo $html->htmlElement('select', $array, $option);

//$select = new SelectHtml('new select','id 1','class 1');

//echo $select->divisionsSelectBox(3);

//print_r($boulesFixtures->getWeeks(1,2));

$display = new FixturesHtml();

$boulesSeasonID = 4;
$boulesFixtureDivision = 1;
$boulesFixtureType = 1;
$boulesFixtureDate = '2022-08-10';

echo $display->displayFixtures($database->executeQuery($boulesFixtures->getBoulesFixtures(0,$boulesSeasonID,0,$boulesFixtureDivision,$boulesFixtureType,$boulesFixtureDate,0)));



//print_r($result);
?>