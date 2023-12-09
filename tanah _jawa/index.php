</html>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Babad Tanah Jawa</title>
</head>

<body>
    <header>
        <h1>Babad Tanah Jawa</h1>
    </header>

    <main class="centered-main">
        <section id="introduction">
            <h2>ꦧꦧꦢ꧀ꦠꦤꦃꦗꦮꦶ</h2>
            <h3>Babad Tanah Jawa</h3>
            <p>Babad Tanah Jawa" adalah istilah yang merujuk pada sejumlah naskah kuno yang menceritakan sejarah dan legenda Jawa. Naskah-naskah ini sering kali berisi cerita tentang berbagai kejadian sejarah, mitos, dan peristiwa yang berkaitan dengan tanah Jawa.</p>
        </section>

        <section id="content">
            <h2>Penjelasan dari beberapa babad tanah jawi yang terkenal antara lain :</h2>
            <div class="icon-container">
                <?php
                $babadList = array("demak", "kraton", "cirebon");

                foreach ($babadList as $babadName) {
                    echo "<div class='icon' onclick='showBabad(\"$babadName\")'>";
                    echo "<img src='K_Cirebon.jpeg' alt='Babad $babadName'>";
                    echo "<p>Babad " . ucfirst($babadName) . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
            <?php
            foreach ($babadList as $babadName) {
                echo "<div id='babad-$babadName' class='babad-info'>";
                echo "<p>Penjelasan tentang Babad " . ucfirst($babadName) . " goes here.</p>";
                echo "</div>";
            }
            ?>
        </section>
    </main>


    <script src="script.js"></script>
</body>

</html>
