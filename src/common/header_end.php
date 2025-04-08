</head>

<body>
    <header>
        <img src="assets/logo.png" alt="Authorial Amenities">
        <nav>
            <ul>
                <li><?php href('main.php', 'Home'); ?></li>
                <li>
                    <?php echo "<button$aboutClass>About</button>"; ?>
                    <ul>
                        <li><?php href('pages/vision.php', 'Vision'); ?></li>
                        <li><?php href('pages/history.php', 'History'); ?></li>
                    </ul>
                </li>
                <li><?php href('pages/services.php', 'Our Services'); ?></li>
                <li><?php href('pages/other.php', 'Resources'); ?></li>
            </ul>
        </nav>
    </header>
    <main>
