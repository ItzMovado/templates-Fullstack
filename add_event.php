<div class="container">
    <h2>Add Event</h2>
    <form action="" method="post">
        <div>
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required>
        </div>
        <div>
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required>
        </div>
        <div>
            <label for="event_time">Event Time:</label>
            <input type="time" id="event_time" name="event_time" required>
        </div>
        <div>
            <label for="entry_price">Entry Price:</label>
            <input type="number" id="entry_price" name="entry_price" step="0.01" required>
        </div>
        <div>
            <input type="submit" name="submit_event" value="Add Event">
        </div>
    </form>

    <?php
    if (isset($_POST['submit_event'])) {
        $event_name = $_POST['event_name'];
        $event_date = $_POST['event_date'];
        $event_time = $_POST['event_time'];
        $entry_price = $_POST['entry_price'];

        try {
            $sql = "INSERT INTO events (event_name, event_date, event_time, entry_price) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$event_name, $event_date, $event_time, $entry_price]);

            echo "<p>Event added successfully!</p>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ?>
</div>
