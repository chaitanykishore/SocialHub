<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social-hub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #28223F;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .forms {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        label, select, textarea {
            display: block;
            text-align: left;
            width: 100%;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input, select, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: calc(100% - 22px);
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="file"] {
            border: none;
            padding: 0;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #fff;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="forms">
        <h2>Edit Profile</h2>
        <form action="edit_profile_script.php" method="POST" enctype="multipart/form-data">
            <label for="profileImage">Profile Image:</label>
            <input type="file" name="profileImage" id="profileImage">
            
            <label for="fullName">Full Name:</label>
            <input type="text" name="fullName" id="fullName">
            
            <label for="gender">Gender:</label>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            
            <label for="bio">Bio:</label>
            <textarea name="bio" id="bio" rows="4" cols="50"></textarea>
            
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
