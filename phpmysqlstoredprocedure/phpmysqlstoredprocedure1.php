<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Stored Procedure Demo 1</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php
        require_once 'dbconfig.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL GetCustomers()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
        ?>
        <table>
            <tr>
			   <!--th>Customer Number</th-->
                <th>Contact Last Name</th>
				<th>Contact First Name</th>
                <!--th>Phone</th-->
                <th>Customer Name</th>
                <th>Credit Limit</th>
            </tr>
            <?php while ($r = $q->fetch()): ?>
                <tr>
				    <td><?php echo $r['contactFirstName'] ?></td>
                    <td><?php echo $r['contactLastName'] ?></td>
					<td><?php echo $r['customerName'] ?></td>
                    <td><?php echo '$' . number_format($r['creditlimit'], 2) ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>    