<?php
$con = mysqli_connect('localhost','root','','gsdcp');

$stud = 2;
$dam = 440;

$dog_parents_fifth_gen = mysqli_query($con,"select * from dog_parents_fifth_gen where id='$stud'");
$dog_parents_fourth_gen = mysqli_query($con,"select * from dog_parents_fourth_gen where id='$stud'");
$dog_parents_third_gen = mysqli_query($con,"select * from dog_parents_third_gen where id='$stud'");
$dog_parents_second_gen = mysqli_query($con,"select * from dog_parents_second_gen where id='$stud'");
$dog_parents_first_gen = mysqli_query($con,"select * from dog_parents_first_gen where id='$stud'");

$male_fifth_gen_dog = array();
$male_fourth_gen_dog = array();
$male_third_gen_dog = array();
$male_second_gen_dog = array();
$male_first_gen_dog = array();
$male_dogs_complete_gen = array();

while(($row_5 =  mysqli_fetch_assoc($dog_parents_fifth_gen))) {
    
    $male_fifth_gen_dog[] = $row_5['lev5_M'];
    array_push($male_fifth_gen_dog,$row_5['lev5_F']);
    //$male_fifth_gen_dog[] = $row['lev5_M'];
    //array_push($male_dogs_complete_gen,$male_fifth_gen_dog);
}

while(($row_4 =  mysqli_fetch_assoc($dog_parents_fourth_gen))) {
    
    $male_fourth_gen_dog[] = $row_4['lev4_M'];
    array_push($male_fourth_gen_dog,$row_4['lev4_F']);
}

while(($row_3 =  mysqli_fetch_assoc($dog_parents_third_gen))) {
    
    $male_third_gen_dog[] = $row_3['lev3_M'];
    array_push($male_third_gen_dog,$row_3['lev3_F']);
}

while(($row_2 =  mysqli_fetch_assoc($dog_parents_second_gen))) {
    
    $male_second_gen_dog[] = $row_2['lev2_M'];
    array_push($male_second_gen_dog,$row_2['lev2_F']);
}

while(($row_1 =  mysqli_fetch_assoc($dog_parents_first_gen))) {
    
    $male_first_gen_dog[] = $row_1['lev1_M'];
    array_push($male_first_gen_dog,$row_1['lev1_F']);
}

$male_dogs_complete_gen = array_merge($male_first_gen_dog,$male_second_gen_dog,$male_third_gen_dog,$male_fourth_gen_dog,$male_fifth_gen_dog);
print_r($male_dogs_complete_gen);

//echo array_search("Jessi von Batu",$male_dogs_complete_gen);

echo '<br>';
echo '<br>';
echo '<br>';
//echo $key = array_search('Jessi von Batu', array_column($male_fifth_gen_dog, 'lev5_F'));


// Female ancesstory

$dog_parents_fifth_gen = mysqli_query($con,"select * from dog_parents_fifth_gen where id='$dam'");
$dog_parents_fourth_gen = mysqli_query($con,"select * from dog_parents_fourth_gen where id='$dam'");
$dog_parents_third_gen = mysqli_query($con,"select * from dog_parents_third_gen where id='$dam'");
$dog_parents_second_gen = mysqli_query($con,"select * from dog_parents_second_gen where id='$dam'");
$dog_parents_first_gen = mysqli_query($con,"select * from dog_parents_first_gen where id='$dam'");

$female_fifth_gen_dog = array();
$female_fourth_gen_dog = array();
$female_third_gen_dog = array();
$female_second_gen_dog = array();
$female_first_gen_dog = array();
$female_dogs_complete_gen = array();

while(($row_5 =  mysqli_fetch_assoc($dog_parents_fifth_gen))) {
    
    $female_fifth_gen_dog[] = $row_5['lev5_M'];
    array_push($female_fifth_gen_dog,$row_5['lev5_F']);
}

while(($row_4 =  mysqli_fetch_assoc($dog_parents_fourth_gen))) {
    
    $female_fourth_gen_dog[] = $row_4['lev4_M'];
    array_push($female_fourth_gen_dog,$row_4['lev4_F']);
}

while(($row_3 =  mysqli_fetch_assoc($dog_parents_third_gen))) {
    
    $female_third_gen_dog[] = $row_3['lev3_M'];
    array_push($female_third_gen_dog,$row_3['lev3_F']);
}

while(($row_2 =  mysqli_fetch_assoc($dog_parents_second_gen))) {
    
    $female_second_gen_dog[] = $row_2['lev2_M'];
    array_push($female_second_gen_dog,$row_2['lev2_F']);
}

while(($row_1 =  mysqli_fetch_assoc($dog_parents_first_gen))) {
    
    $female_first_gen_dog[] = $row_1['lev1_M'];
    array_push($female_first_gen_dog,$row_1['lev1_F']);
}

$female_dogs_complete_gen = array_merge($female_first_gen_dog,$female_second_gen_dog,$female_third_gen_dog,$female_fourth_gen_dog,$female_fifth_gen_dog);
print_r($female_dogs_complete_gen);

// checking comomon ancestory from male side
echo '<br>';
echo '<br>';
echo '<br>';

$total_male = count($male_dogs_complete_gen);
for($i=0; $i <= $total_male; $i++) { 
  
    
    if(in_array($male_dogs_complete_gen[$i], $female_dogs_complete_gen)){
        //array_search("Jessi von Batu",$male_dogs_complete_gen);
        echo $male_dogs_complete_gen[$i].' - '.$i;
        echo '<br>';
    }else{
        //echo 'No found';
    }

}

// checking comomon ancestory from female side

$total_female = count($female_dogs_complete_gen);
for($i=0; $i <= $total_female; $i++) { 
  
    
    if(in_array($female_dogs_complete_gen[$i], $male_dogs_complete_gen)){
        //array_search("Jessi von Batu",$male_dogs_complete_gen);
        echo $female_dogs_complete_gen[$i].' - '.$i;
        echo '<br>';
    }else{
        //echo 'No found';
    }

}




?>
