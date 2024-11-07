<?php

include 'header.php';
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
    </style>
</head>
<body>
<div class="profile-container">
    <img class="profile-image" src="uploads-images/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Image">
    <h6 class="profile-heading">Admin Profile</h6>
    <div class="profile-info">
        <p>Name: <span><?php echo htmlspecialchars($user['name']); ?></span><a href="editadmin-profile.php?id=<?php echo $user['user_id']?>" class="">changename</a></p>
        <p>Email: <span><?php echo htmlspecialchars($user['email']); ?></span><a href="editadmin-profile.php?id=<?php echo $user['user_id']?>" class="">changeEmail</a></p>
        <p>Password: <span><?php echo htmlspecialchars($user['password']); ?></span><a href="editadmin-profile.php?id=<?php echo $user['user_id']?>" class="">changePassword</a></p>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


