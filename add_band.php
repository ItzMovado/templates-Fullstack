<div class="container">
    <h2>Add Band</h2>
    <form action="" method="post">
        <div>
            <label for="band_name">Band Name:</label>
            <input type="text" id="band_name" name="band_name" required>
        </div>
        <div>
            <label for="music-genre">Genre:</label>
            <br>
            <select id="music-genre" name="band_genre" required>
                <option value="Rock">Rock</option>
                <option value="Hiphop">Hiphop</option>
                <option value="Rap">Rap</option>
                <option value="RnB">RnB</option>
                <option value="Jazz">Jazz</option>
                <option value="Techno">Techno</option>
                <option value="Pop">Pop</option>
            </select>
        </div>
        <div>
            <input type="submit" name="submit_band" value="Add Band">
        </div>
    </form>

    <?php
    if (isset($_POST['submit_band'])) {
        $band_name = $_POST['band_name'];
        $band_genre = $_POST['band_genre'];

        try {
            $sql = "INSERT INTO bands (band_name, band_genre) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$band_name, $band_genre]);

            echo "<p>Band added successfully!</p>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ?>
</div>
