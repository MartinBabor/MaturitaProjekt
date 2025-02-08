<?php
require 'databaze.php';

$query = "SELECT hraci.username, MAX(tophraci.score) as best_score 
          FROM tophraci 
          JOIN hraci ON tophraci.id = hraci.id 
          GROUP BY hraci.id, hraci.username 
          ORDER BY best_score DESC";

$result = $conn->query($query);
?>

    <div class="tabulka">
        <h1>Nejlepší hráči</h1>
        <table>
            <tr>
                <th>Hráč</th>
                <th>Nejlepší skóre</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['best_score']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

<?php
$conn->close();
?>
