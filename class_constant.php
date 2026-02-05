<?php
class UserRole {
    
    const ADMIN = 'Administrator'; // Class constants
    const TEACHER = 'Teacher'; // Class constants
    const STUDENT = 'Student'; // Class constants
    const STAFF = 'STAFF'; // Class constants

    // static function sample() {
    //     define("STAFF", "STAFF");
    // }
}

echo UserRole::ADMIN . "<br>";
echo UserRole::TEACHER . "<br>";
echo UserRole::STUDENT. "<br>";

// UserRole::sample();
echo UserRole::STAFF. "<br>";

?>