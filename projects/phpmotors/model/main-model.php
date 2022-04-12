<?php
function getClassifications(){
    $db = phpmotorsConnect(); 

    // The only thing added was the , classificationId. This should also select the classificationId. 
    $sql = 'SELECT classificationName, classificationId FROM carclassification ORDER BY classificationName ASC'; 
    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    $classifications = $stmt->fetchAll(); 
    $stmt->closeCursor(); 

    return $classifications;
   }