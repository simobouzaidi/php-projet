<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Check 30 Seconds</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="valide">Valide</button>
    </form>

    <?php
    session_start();

    if (isset($_POST['valide'])) {
        // تخزين الوقت الحالي في جلسة
        $_SESSION['check_time'] = date('Y-m-d H:i:s');
        echo "تم تأكيد العملية. اضغط على زر التحقق بعد 30 ثانية.";
    }

    if (isset($_SESSION['check_time'])) {
        require_once 'database/database.php'; // ملف الاتصال بقاعدة البيانات

        // استعلام SQL للتحقق من الأشخاص الذين أكملوا 30 ثانية من وقت الضغط على الزر
        $sql = "SELECT * FROM client WHERE TIMESTAMPDIFF(SECOND, date_inscp, :check_time) >= 30";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['check_time' => $_SESSION['check_time']]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Date</th></tr>";
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id_cl"] . "</td>";
                    echo "<td>" . $row["nom_cl"] . "</td>";
                    echo "<td>" . $row["prix"] . "</td>";
                    echo "<td>" . $row["date_inscp"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No clients found.";
            }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }

        // إغلاق الاتصال
        $pdo = null;
    }
    ?>
</body>
</html>