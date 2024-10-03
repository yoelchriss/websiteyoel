<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: dashboard_user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dahsboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <ul class="menu-items">
                <li><a href="dashboard_admin.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <h1 class="logo">KELOMPOK 1 & 5</h1>
        </div>
    </nav>
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        </div>
    </section>

    <section id="choice">
        <h2>Menu</h2>
        <div class="card-container">
            <article class="card" onclick="navigateToNewPage('dashboard_news.php')">

                <img class="card__background" src="https://1.bp.blogspot.com/_SqPrFcMOs9E/TLxCBqP2X6I/AAAAAAAAAJM/aQR6YJN-vSs/s1600/Berita.jpg" alt="" width="1920" height="2193" />
                <div class="card__content">
                    <div class="card__content--container">
                        <h2 class="card__title"><b>News</b></h2>
                        <p class="card__description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum in
                            labore laudantium deserunt fugiat numquam.
                        </p>
                    </div>
                </div>
            </article>

            <article class="card" onclick="navigateToNewPage('dashboard_photo.php')">
                <img class="card__background" src="https://wallpapercave.com/wp/wp1873222.jpg" alt="" width="1920" height="2193" />
                <div class="card__content">
                    <div class="card__content--container">
                        <h2 class="card__title"><b>Photo</b></h2>
                        <p class="card__description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum in
                            labore laudantium deserunt fugiat numquam.
                        </p>
                    </div>
                </div>
            </article>
            <article class="card" onclick="navigateToNewPage('donate_admin.php')">
                <img class="card__background" src="https://media.istockphoto.com/photos/donation-concept-the-volunteer-giving-a-donate-box-to-the-recipient-picture-id1353332258?b=1&k=20&m=1353332258&s=170667a&w=0&h=tsU8wdJuXCIXJ8wTC8PgLAin3A5sDAStCbqwB8erLyI=" alt="" width="1920" height="2193" />
                <div class="card__content">
                    <div class="card__content--container">
                        <h2 class="card__title"><b>Donation</b></h2>
                        <p class="card__description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum in
                            labore laudantium deserunt fugiat numquam.
                        </p>
                    </div>
                </div>
            </article>
            <article class="card" onclick="navigateToNewPage('suggestion_admin.php')">
                <img class="card__background" src="https://www.tat.net.au/images/suggestionbox.png" alt="" width="1920" height="2193" />
                <div class="card__content">
                    <div class="card__content--container">
                        <h2 class="card__title"><b>Sugestion</b></h2>
                        <p class="card__description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum in
                            labore laudantium deserunt fugiat numquam.
                        </p>
                    </div>
                </div>
            </article>
            <article class="card" onclick="navigateToNewPage('dashboard_division.php')">
                <img class="card__background" src="https://th.bing.com/th/id/OIP.lCdRMUQWFT1HpZ7b2JI4DAHaE3?rs=1&pid=ImgDetMain" alt="" width="1920" height="2193" />
                <div class="card__content">
                    <div class="card__content--container">
                        <h2 class="card__title"><b>Division</b></h2>
                        <p class="card__description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum in
                            labore laudantium deserunt fugiat numquam.
                        </p>
                    </div>
                </div>
            </article>

        </div>
    </section>
</body>

</html>

<script>
    function navigateToNewPage(pageUrl) {
        window.location.href = pageUrl;
    }
</script>