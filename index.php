<?php
require_once "back-end/config.php";

$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacoste - Proposal</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=product">Products</a></li>
            <li><a href="index.php?page=form">Form</a></li>
        </ul>
    </nav>

    <header>
        <img src="images/Lacoste-logo.jpeg" alt="Lacoste Logo" style="max-width: 200px; height: auto;">
        <h1>Lacoste</h1>
    </header>

    <main>
        <?php
        switch ($page) {
            case 'product':
                ?>
                <section>
                    <h2>Our Product</h2>
                    <div class="product">
                        <img src="images/footwear.jpeg" alt="Footwear Shoes">
                        <p>Footwear Shoes - $99.99</p>
                    </div>
                </section>
                <?php
                break;
            case 'form':
                ?>
                <section>
                    <h2>Fill out the form</h2>
                    <form action="#" method="post">
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name"><br>

                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email"><br>

                        <label for="message">Message:</label><br>
                        <textarea id="message" name="message"></textarea><br>

                        <input type="submit" value="Submit">
                    </form>
                </section>
                <?php
                break;
            default:
                ?>
                <section>
                    <h2>Welcome to Lacoste Database-Driven Web Application</h2>
                    <p>This project aims to create an interactive web application for managing Lacoste's product inventory and customer information.</p>
                    <h3>Features:</h3>
                    <ul>
                        <li>Product browsing and searching functionality</li>
                        <li>User registration and authentication</li>
                        <li>Shopping cart and checkout system</li>
                        <li>Order tracking for users</li>
                        <li>Admin panel for managing products, users, and orders</li>
                    </ul>
                </section>

                <section id="employees">
                    <h2>Employees</h2>
                    <div class="container">
                        <ul>
                            <li><a href="back-end/create.php">Add New Employee</a></li>
                        </ul>
                    </div>
                    <?php
                    $query = "SELECT * FROM employees";
                    $result = mysqli_query($link, $query);

                    if (mysqli_num_rows($result) > 0) :
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['salary']; ?></td>
                                        <td>
                                            <a href="back-end/read.php?id=<?php echo $row['id']; ?>" title="View Record">View</a>
                                            <a href="back-end/update.php?id=<?php echo $row['id']; ?>" title="Update Record">Update</a>
                                            <a href="back-end/delete.php?id=<?php echo $row['id']; ?>" title="Delete Record">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No records found.</p>
                    <?php endif; ?>
                </section>
        <?php
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Lacoste Web App</p>
    </footer>
</body>

</html>
