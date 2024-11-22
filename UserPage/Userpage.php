<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    if(empty($name) || empty($email) || empty($phone)){
        echo "<p>Must fill in all the information.</p>";
        exit();
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<p>Invalid email</p>";
        exit();
    }

    function saveDataJSON($file,$name,$email,$phone){
        $contact =[
        "name" => $name,
        "email" => $email,
        "phone" => $phone
        ];
        $data = [];
        if(file_exists($file)){
            $data = json_decode(file_get_contents($file),true);
        }
        $data[] = $contact;
        $result = file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT));

        return  $result !== false;
    }

    $file = "user.json";
    if(saveDataJSON($file, $name,$email,$phone )){
        echo "Registration successful!";
        echo "<p>Your data has been saved.</p>";
    }
    else{
        echo "Failed to save data.";
    }
    displayRegisteredUsers($file);
}
    function displayRegisteredUsers($file){
    if(file_exists($file) && filesize($file) > 0 ){
        $data = json_decode(file_get_contents($file),true);
        echo "Registered Users:";
        echo "<Table border = '1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
        foreach($data as $user){
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
            htmlspecialchars($user["name"]),
            htmlspecialchars($user["email"]),
            htmlspecialchars($user["phone"])
            );    
        }
        echo "</table>";
    }else{
        echo "<p>No registered users found.</p>";
        }
    }
?>