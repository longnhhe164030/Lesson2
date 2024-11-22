<!DOCTYPE html>
<html>
<head>
    <title>Find Largest Element in a Matrix</title>
</head>
<body>
    <h2>Matrix Input Form</h2>
    <form method="post">
        <label for="rows">Number of Rows:</label>
        <input type="number" name="rows" required><br><br>

        <label for="cols">Number of Columns:</label>
        <input type="number" name="cols" required><br><br>

        <label for="matrix">Matrix Elements:</label><br>
        <textarea name="matrix" rows="10" cols="30" ></textarea><br><br>

        <button type="submit">Find Largest Element</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rows = intval($_POST["rows"]);
        $cols = intval($_POST["cols"]);
        $matrixInput = trim($_POST["matrix"]);

        $matrix = [];
        $rowsInput = explode("\n", $matrixInput); 
        foreach ($rowsInput as $row) {
            $matrix[] = array_map('floatval', explode(',', $row)); 
        }

        if (count($matrix) != $rows || count($matrix[0]) != $cols) {
            echo "<p style='color:red;'>Error: Matrix dimensions do not match the specified rows and columns.</p>";
            exit();
        }

        $maxValue = $matrix[0][0];
        $maxRow = 0;
        $maxCol = 0;

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($matrix[$i][$j] > $maxValue) {
                    $maxValue = $matrix[$i][$j];
                    $maxRow = $i;
                    $maxCol = $j;
                }
            }
        }

        echo "<h3>Matrix:</h3>";
        echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
        foreach ($matrix as $row) {
            echo "<tr>";
            foreach ($row as $element) {
                echo "<td>$element</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<p><strong>Largest Element:</strong> $maxValue</p>";
        echo "<p><strong>Coordinates:</strong> Row " . ($maxRow + 1) . ", Column " . ($maxCol + 1) . "</p>";
    }
    ?>
</body>
</html>
