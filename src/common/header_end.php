</head>

<body>
    <header>
        <a href="main.php">
            <img src="assets/logo.png" alt="Authorial Amenities">
        </a>
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
                <li>
                    <?php
                        echo "<a $serviceClass href=\"pages/catalog.php\">" .
                            "Our Services</a>";
                    ?>
                    <ul>
                        <li><?php href('pages/catalog.php', 'Catalog'); ?></li>
                        <li><?php href('pages/services.php', 'List'); ?></li>
                    </ul>
                </li>
                <li><?php href('pages/other.php', 'Resources'); ?></li>
            </ul>
        </nav>
    </header>
    <main>
