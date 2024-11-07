<?php

include 'header2.php';
include 'link.php';

?>

    <style>
        .profile-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        text-align: center;
        border: 2px solid #4CAF50;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #4CAF50;
        margin-bottom: 15px;
    }

    .profile-info {
        font-size: 1.1em;
        margin-bottom: 10px;
        color: #333;
    }

    .profile-info span {
        font-weight: 300;
    }

    .profile-heading {
        font-size: 1.2em;
        color: #4CAF50;
        margin-bottom: 10px;
    }


    /* Media query for mobile devices */
    @media (max-width: 600px) {
        .profile-container {
            width: 90%;
            padding: 15px;
            margin: 20px auto;
        }

        .profile-info {
            font-size: 1em;
        }

        .profile-image {
            width: 100px;
            height: 100px;
        }
    }
</style>
</head>
<body>
    <div class="profile-container">
        <img class="profile-image" src="uploads-images/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Profile Image"><a href="editdoctor-profile.php?id=<?php echo htmlspecialchars($user_id); ?>">Change Profile</a>
        <h6 class="profile-heading">Doctor Profile</h6>
        <div class="profile-info">
            <p>Name: <span><?php echo htmlspecialchars($_SESSION['name']); ?></span><a href="editdoctor-profile.php?id=<?php echo htmlspecialchars($user_id); ?>"> Change Name</a></p>
            <p>Email: <span><?php echo htmlspecialchars($_SESSION['email']); ?></span> <a href="editdoctor-profile.php?id=<?php echo htmlspecialchars($user_id); ?>"> change Email</a></p>
            <p>passsword: <span class="hash"><?php echo htmlspecialchars($_SESSION['password']); ?></span> <a href="editdoctor-profile.php?id=<?php echo htmlspecialchars($user_id); ?>"> change password</a></p>
            <p>Phone: <span><?php echo htmlspecialchars($phone_number); ?></span></p>
            <p class="">Specialization: <span><?php echo htmlspecialchars($category_name); ?></span></p>
        </div>
    </div>
   <?php  
   include 'footer.php';
   
   ?>