<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #e91e63;
            color: white;
        }

        .navbar .logo {
            font-family: 'Georgia', serif;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .logo:hover {
            background-color: transparent;
            color: #e91e63;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="fullstack.php?page=home">Home</a></li>
        <li><a href="fullstack.php?page=add_event">Add Event</a></li>
        <li><a href="fullstack.php?page=add_band">Add Band</a></li>
        <li><a href="fullstack.php?page=link_band_event">Link Band to Event</a></li>
        <li><a href="fullstack.php?page=view_events">View Events</a></li>
    </ul>
</nav>


    
</body>
</html>

