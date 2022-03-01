<?php

//get movies by id
function getMovie($db, $movieId)
{
$sql = 'Select m.title, m.year, m.language from movie m ';
$sql .= 'Where m.id = :id';
$stmt = $db->prepare ($sql);
$id = (int) $movieId;
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get all movie 
function getAllMovie($db)
{
$sql = ' Select m.title, m.year, m.language from movie m';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);

//add new movie
function createMovie($db, $form_data) {
    $sql = 'Insert into movie (title, year, language) ';
    $sql .= 'values (:title, :year, :language)';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':title', $form_data['title']);
    $stmt->bindParam(':year',($form_data['year']));
    $stmt->bindParam(':language',($form_data['language']));
    $stmt->execute();
    return $db->lastInsertID();//insert last number.. continue
    }


//delete movies by id
function deleteMovie($db,$movieId) {
    $sql = ' Delete from movie where id = :id';
    $stmt = $db->prepare($sql);
    $id = (int)$movieId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }

    
    //update movie by id
    function updateMovie($db,$form_dat,$movieId) {
    $sql = 'UPDATE movie SET title = :title , language = :language ,
    year = :year ';
    $sql .=' WHERE id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int)$movieId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':title', $form_dat['title']);
    $stmt->bindParam(':year',$form_dat['year']);
    $stmt->bindParam(':language',($form_dat['language']));
    $stmt->execute();
    }
}