<div class="container">
    <h2>Events and Bands</h2>
    <table>
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Entry Price</th>
                <th>Bands</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT e.event_name, e.event_date, e.event_time, e.entry_price, GROUP_CONCAT(b.band_name SEPARATOR ', ') as bands 
                        FROM events e 
                        LEFT JOIN event_band eb ON e.event_id = eb.event_id 
                        LEFT JOIN bands b ON eb.band_id = b.band_id 
                        GROUP BY e.event_id";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['event_name']}</td>";
                    echo "<td>{$row['event_date']}</td>";
                    echo "<td>{$row['event_time']}</td>";
                    echo "<td>{$row['entry_price']}</td>";
                    echo "<td>{$row['bands']}</td>";
                    echo "</tr>";
                }
            } catch(PDOException $e) {
                echo "<tr><td colspan='5'>Failed to load events: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }
</style>
