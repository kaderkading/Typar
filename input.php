<?php

include("db.php");

$table_name = '300_words';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $words = trim($_POST['words']);
    $words_arr = explode(" ",$words);
    // echo $words;
    // print_r($words_arr);
    // foreach($words_arr as $word)
    // {
    //     echo $word." ";
    // }

    
    // try{
    //     $pdo->beginTransaction();
    //     foreach($words_arr as $word)
    //     {
    //         $query = "insert into $table_name (word) values(:word)";
    //         $stmt = $pdo->prepare($query);
    //         $stmt->bindValue(':word',$word,PDO::PARAM_STR);
    //         $stmt->execute();
    //     }
    //     $pdo->commit();
        
    // }
    // catch(PDOException $e){
    //     echo "There was something wrong with entering the data".$e->getMessage();
    //     $pdo->rollback();            
    
    // }

    try{
        $query = "select * from $table_name";
        $stmt = $pdo->query($query);

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo $row['word']."<br>";
        }


    }catch(PDOException $e){
        echo "there was something wrong with showing the data".$e->getMessage();
    }
}
else{
    echo "form not submited";
}

?>
