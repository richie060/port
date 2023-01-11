<?php 

   require('database/connect.php');


  function dd($value)
  {
     echo "<pre>", print_r($value, true), "</pre>";
     die();
  }

// $existingUser = selectOne('users', ['email' => $user['email']]);
//       if ($existingUser) {
//          array_push($errors,' Email alredy exists');
//       }

function validateTopic($topic)
{

	$errors = array();
	if (empty($topic['name'])) {
		array_push($errors, "Name is required");
	}

	$existingTopic = selectOne('topics', ['name' => $topic['name']]);

	if (isset($existingTopic)) {
		array_push($errors, "Name already Exist");
	}
	return $errors;
}
      
  function executedQuery($sql, $data)
{
         global $conn;
         $stmt = $conn-> prepare($sql);
         $values = array_values($data);
         $types = str_repeat('s',count($values));
         $stmt->bind_param($types, ...$values);
         $stmt->execute();
         return $stmt;

}




      


   function selectAll($table, $conditions = [])
   {
      global $conn;
      $sql = "SELECT * FROM $table";
      if (empty($conditions)) {
         $stmt = $conn-> prepare($sql);
         $stmt->execute();
         $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
         return $records;
      }else{

         $i=0;
         foreach ($conditions as $key => $value) {

            if ($i === 0) {
            $sql = $sql . "WHERE $key=?" ;
         }else{
            $sql = $sql . "AND $key=?" ;
         }
         $i++;
         }
         $stmt = executedQuery($sql, $conditions);
         $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
         return $records;     
      }   
   }


   function selectOne($table, $conditions)
   {
      global $conn;
      $sql = "SELECT * FROM $table";
         $i=0;
         foreach ($conditions as $key => $value) {

            if ($i === 0) {
            $sql = $sql . " WHERE $key=?" ;
         }else{
            $sql = $sql . " AND $key=?" ;
         }
         $i++;
         }
         $sql = $sql . " LIMIT 1";
        $stmt = executedQuery($sql, $conditions);
         $records = $stmt->get_result()->fetch_assoc();
         return $records;     
      
      }

      function create($table ,$data){
         global $conn;
         $sql = "INSERT INTO $table SET ";
          $i=0;
         foreach ($data as $key => $value) {

            if ($i === 0) {
            $sql = $sql . " $key=?";
         }else{
            $sql = $sql . ", $key=?";
         }
         $i++;
         }
         $stmt = executedQuery($sql, $data);
         $id = $stmt->insert_id;
         return $id;
      }


        function update($table, $id ,$data){
         global $conn;
         $sql = "UPDATE  $table SET ";
          $i = 0;
         foreach ($data as $key => $value) {

            if ($i === 0) {
            $sql = $sql . " $key=?" ;
         }else{
            $sql = $sql . ", $key=?" ;
         }
         $i++;
         }

         $sql = $sql . " WHERE id=?";
         $data['id'] = $id;
         $stmt = executedQuery($sql, $data);
         return $stmt->affected_rows;
      }

       function delete($table, $id ){
         global $conn;
         $sql = "DELETE FROM   $table WHERE id=? ";
         
         $stmt = executedQuery($sql, ['id' => $id]);
         return $stmt->affected_rows;
      }



 




      function searchPost($term){
         $match = '%' . $term . '%';
         global $conn;
         $sql = "SELECT 
         p.*, u.username FROM post AS p
         JOIN users AS u
         ON p.user_id=u.id
         WHERE p.published=?
         AND p.title LIKE ? OR p.body LIKE ?
          ";
           $stmt = executedQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
         $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
         return $records;
      }

      function getPublishedPost(){
         global $conn;
         $sql = "SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";
         $stmt = executedQuery($sql, ['published' => 1]);
         $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);        
         return $records;
        
      }
      
      function getPostByTopicid($topic_id){
         global $conn;
         $sql = "SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id = u.id WHERE  p.published=? AND topic_id=?";
         $stmt = executedQuery($sql, ['published' => 1, 'topic_id' =>  $topic_id]);
         $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);        
         return $records;
        
      }

 ?>