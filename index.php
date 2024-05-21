<!DOCTYPE html>
<html>
<head>
    <title>Galnoel Rindengan's Site</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header class="navbar">
        <h3>Galnoel</h3>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
    </header>

    <main>
        <section id="home">
            <div class="greetings">
                <h1>Greetings!</h1>
                <h2>I'm Galnoel Rindengan,</h2>
                <p>a data science and backend enthusiast with a zest for continuous learning and professional growth. I excel in team environments, leveraging collective insights to enhance my expertise. Quick to learn and eager to adapt, I’m constantly seeking out new challenges in the data and coding landscape, aiming to innovate and drive success.</p>
                <img class="img1" src="images/foto-diri.png" alt="foto-diri">
            </div>
        </section>

        <section id="gallery">
            <div class="gallery">
                <h1>Gallery</h1>
                <figure>
                    <img class="img2" src="images/techofest1.JPG" alt="Techofest 2023">
                    <figcaption>Project Team Techofest 2023.</figcaption>
                </figure>
                <figure>
                    <img class="img2" src="images/baksos_fkprt2023.JPG" alt="Baksos FKPRT 2023">
                    <figcaption>Bakti Sosial FKPRT 2023.</figcaption>
                </figure>
                <figure>
                    <img class="img2" src="images/meetml2.jpg" alt="Pertemuan 2 Divisi ML">
                    <figcaption>Pertemuan Unity Divisi Machine Learning.</figcaption>
                </figure>
            </div>
        </section>

        <section id="blog">
            <h1>Blogs</h1>

            <div class="article-box">
                <h1>How AI Is Impacting Society And Shaping The Future(AI)</h1>
                <p>In an age of swift technological evolution, artificial intelligence (AI) emerges as a transformative influence with the capacity to reshape both our society and industries. Anchored in ethics, transparency, and accountability, the development of AI becomes pivotal, acting as the cornerstone for constructing a future that seamlessly integrates technological advancement with social responsibility.</p>
                <a href="https://www.forbes.com/sites/kalinabryant/2023/12/13/how-ai-is-impacting-society-and-shaping-the-future/?sh=236dc8282f92" target="_blank">Read more</a>
            </div>

            <div class="article-box">
                <h1>Blockchain Facts: What Is It, How It Works, and How It Can Be Used</h1>
                <p>A blockchain is a distributed database or ledger shared among a computer network's nodes. They are best known for their crucial role in cryptocurrency systems for maintaining a secure and decentralized record of transactions, but they are not limited to cryptocurrency uses. Blockchains can be used to make data in any industry immutable—the term used to describe the inability to be altered.</p>
                <a href="https://www.investopedia.com/terms/b/blockchain.asp" target="_blank">Read more</a>
            </div>

            <div class="article-box">
                <h1>Apple's Mixed-Reality Headset, Vision Pro, Is Here</h1>
                <p>The headset, named Apple Vision Pro, has been in the works for years, with Apple taking its familiar wait-and-see approach while other giant tech companies have dived headfirst into the still-kludgy AR/VR market. The new platform and headset have massive implications for the rest of the market; once Apple wades into a product category, it often both validates the category and obviates competitors. </p>
                <a href="https://www.wired.com/story/apple-vision-pro-specs-price-release-date/" target="_blank">Read more</a>
            </div>
        </section>

        <section id="contact">
            <h1>Contact Me</h1>
            <p>I'd love to hear from you! Whether you have a question, a project proposal, or just want to say hello, feel free to reach out. Here's how you can connect with me:</p>
            <p>rindengangalnoel@gmail.com</p>
            <a href="https://www.linkedin.com/in/galnoel-rindengan" target="_blank">Linkedin</a>
            <br>
            <a href="https://github.com/galnoel/galnoel.github.io.git" target="_blank">Repository Link</a>

            <!-- Form Komentar -->
            <?php
            // Sertakan file kon    figurasi
            require 'config.php';

            // Menangani form komentar
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $isi_komentar = $_POST['isi_komentar'];

                // Menambahkan komentar ke database
                $sql = "INSERT INTO komentar (nama, email, isi_komentar) VALUES (?, ?, ?)";

                // Mempersiapkan statement
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $nama, $email, $isi_komentar);

                // Menjalankan statement
                if ($stmt->execute()) {
                    echo "Komentar berhasil ditambahkan!";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Menutup statement
                $stmt->close();
            }
            $sql = "SELECT nama, email, isi_komentar, tanggal  FROM komentar ORDER BY id DESC";
            $result = $conn->query($sql);

            // Menutup koneksi
            $conn->close();
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                Nama: <input type="text" name="nama" required><br>
                Email: <input type="email" name="email" required><br>
                Komentar:<br>
                <textarea name="isi_komentar" required></textarea><br>
                <input type="submit" value="Kirim Komentar">
            </form>

            <h1>Komentar</h1>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='komentar'>";
                    echo "<h3>" . htmlspecialchars($row['nama']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['isi_komentar']) . "</p>";
                    echo "<small>" . htmlspecialchars($row['tanggal']) . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p>Belum ada komentar.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>© 2024 Galnoel's Personal Website</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>