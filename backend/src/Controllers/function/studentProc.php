<?php 
//get all STUDENT 
function getAllstudent($db) {

    
    $sql = 'Select * FROM student '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get STUDENT by id 
function getstudent($db, $Id) {

    $sql = 'Select o.Id, o.studentName, o.studentID, o.borrowDate, o.returnDate FROM student o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $Id;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new STUDENT 
function createstudent($db, $form_data) { 
    //stop at sisni
    $sql = 'Insert into student ( Id, studentName, studentID, borrowDate, returnDate)'; 
    $sql .= 'values (:Id, :studentName, :studentID, :borrowDate, :returnDate)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':Id', $form_data['Id']);  
    $stmt->bindParam(':studentName', ($form_data['studentName']));
    $stmt->bindParam(':studentID', ($form_data['studentID']));
    $stmt->bindParam(':borrowDate', ($form_data['borrowDate']));
    $stmt->bindParam(':returnDate', ($form_data['returnDate']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete STUDENT by id 
function deletestudent($db,$Id) { 

    $sql = ' Delete from student where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$Id; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update STUDENT by id 
function updatestudent($db,$form_dat,$Id) { 

    
    $sql = 'UPDATE student SET Id = :Id, studentName = :studentName , studentID = :studentID , borrowDate = :borrowDate , returnDate = :returnDate'; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$Id;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':Id', $form_dat['Id']);    
    $stmt->bindParam(':studentName', ($form_dat['studentName']));
    $stmt->bindParam(':studentID', ($form_dat['studentID']));
    $stmt->bindParam(':borrowDate', ($form_dat['borrowDate']));
    $stmt->bindParam(':returnDate', ($form_dat['returnDate']));
    $stmt->execute(); 
}
