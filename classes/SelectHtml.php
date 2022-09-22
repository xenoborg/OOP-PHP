<?php

class SelectHtml extends DisplayHtml
{

private $elementId;
private $elementClass;
private $elementName;
private $elementProperties;

    public function __construct($id, $class, $name)
    {
        $this->elementId = $id;
        $this->elementClass = $class;
        $this->elementName = $name;
        $this->setProperties();
    }

    public function setId($id)
    {
        $this->elementId = $id;
        $this->setProperties();
    }

    public function setClass($class)
    {
        $this->elementClass = $class;
        $this->setProperties();
    }

    public function setName($name)
    {
        $this->elementName = $name;
        $this->setProperties();
    }

    private function setProperties()
    {
        $this->elementProperties = ['id' => $this->elementId, 'class' => $this->elementClass, 'name' => $this->elementName];
    }

    public function divisionsSelectBox(int $division)
    {
        for($a=1;$a<=3;$a++)
        {
            $optionProperties = $a === $division ? ['value' => $a, 'selected' => 'selected'] : ['value' => $a];
            $option[] = $this->htmlElement('option', $optionProperties, $a);
        }
        $options = implode("",$option);
        return $this->htmlElement('select', $this->elementProperties, $options);
    }
    
    public function seasonsSelectBox(int $year, array $seasons)
    {
        foreach($seasons as $season) 
        {
            $optionProperties = $season['boulesSeason_year'] === $year ? ['value' => $season['boulesSeason_ID'], 'selected' => 'selected'] : ['value' => $season['boulesSeason_ID']];
            $option[] = $this->htmlElement('option', $optionProperties, $season['boulesSeason_year']);
        }
        $options = implode("",$option);
        return $this->htmlElement('select', $this->elementProperties, $options);
    }

    public function teamsSelectBox(int $boulesTeamID, array $teams)
    {
        foreach($teams as $team) 
        {
            $optionProperties = $team['boulesTeam_ID'] === $boulesTeamID ? ['value' => $team['boulesTeam_ID'], 'selected' => 'selected'] : ['value' => $team['boulesTeam_ID']];
            $option[] = $this->htmlElement('option', $optionProperties, $team['boulesTeam_name']);
        }
        $options = implode("",$option);
        return $this->htmlElement('select', $this->elementProperties, $options);
    }

    public function knockoutsSelectBox($boulesKnockoutRound)
    {
        $rounds = [1,2,3,4,5,6,7,8,9,10,'qf','sf','f'];
        foreach($rounds as $round) 
        {
            if($round == 'qf') 
            {
                $name = "Quarter Final";
            }
            else if($round == 'sf') 
            {
                $name = "Semi Final";  
            }
            else if($round == 'f') 
            {
                $name = "Final";
            }
            else 
            {
                $name = "Round $round";
            }
            $optionProperties = $round === $boulesKnockoutRound ? ['value' => $round, 'selected' => 'selected'] : ['value' => $round];
            $option[] = $this->htmlElement('option', $optionProperties, $name);
        }
        $options = implode("",$option);
        return $this->htmlElement('select', $this->elementProperties, $options);
    }
}

?>