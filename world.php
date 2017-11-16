<?php

$host = getenv('IP');
$username = 'C9_USER';
$password = '';
$dbname = 'world';
$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if($country == "all-true")
{
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    echo '<ul>';
    foreach ($results as $row) 
    {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
}
elseif($country == "")
{
   echo "enter a country please and thanks";  
}
else
{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($results))
    {
        echo '<ul>';
        foreach($results as $row)
        {
            echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
        echo '</ul>';
    }
    else
    {
        echo "Record doesnt exist";
    }
}