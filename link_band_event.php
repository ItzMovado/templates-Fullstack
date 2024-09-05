<form action="" method="post">
    <div>
        <label for="event_id">Select Event:</label>
        <select id="event_id" name="event_id" required>
            <?php
            try {
                $events = $conn->query("SELECT * FROM events")->fetchAll();
                foreach ($events as $event) {
                    echo "<option value='{$event['event_id']}'>{$event['event_name']}</option>";
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </select>
    </div>
    <div>
        <label for="band_id">Select Bands:</label>
        <select id="band_id" name="band_id[]" multiple required>
            <?php
            try {
                $bands = $conn->query("SELECT * FROM bands")->fetchAll();
                foreach ($bands as $band) {
                    echo "<option value='{$band['band_id']}'>{$band['band_name']}</option>";
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </select>
    </div>
    <div>
        <input type="submit" name="submit_link" value="Link Bands to Event">
    </div>
</form>

<?php
if (isset($_POST['submit_link'])) {
    $event_id = $_POST['event_id'];
    $band_ids = $_POST['band_id'];  // Dit is nu een array

    try {
        $conn->beginTransaction();

        $sql = "INSERT INTO event_band (event_id, band_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        foreach ($band_ids as $band_id) {
            $stmt->execute([$event_id, $band_id]);
        }

        $conn->commit();
        echo "<p>Bands linked to event successfully!</p>";
    } catch(PDOException $e) {
        $conn->rollBack();
        echo "Failed to link bands: " . $e->getMessage();
    }
}
?>
