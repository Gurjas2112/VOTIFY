// Step 1: Establish a connection to the MySQL database using PHP

// Create a database connection
$servername = "localhost";
Here's an example code snippet that demonstrates how to update the "Full Name", "Phone Number", and "Date of Birth" fields in the "personal_details" table in the MySQL database:

```php
$username = "username";
$password = "password";
$dbname = "myDB";

// Step 1: Establish a connection to the MySQL database using PHP

// Create a database connection
$servername = "localhost";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve the personal details data from the MySQL database using a SELECT statement

// Retrieve the personal details data from the database
// Step 2: Retrieve the personal details data from the MySQL database using a SELECT statement

// Retrieve the personal details data from the database
$sql = "SELECT id, full_name, phone_number, date_of_birth FROM personal_details WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET["id"]);
$sql = "SELECT id, full_name, phone_number, date_of_birth FROM personal_details WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo '<form method="post">';
  $row = $result->fetch_assoc();
  echo '<form method="post">';
  echo '<div class="input-group">';
  echo '<label for="inputText" class="col-sm-2 col-form-label">Full Name as per Aadhar card</label>';
  echo '<div class="col-sm-10">';
  echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
  echo '<div class="input-group">';
  echo '<input type="text" class="form-control" name="full_name" value="' . $row["full_name"] . '">';
  echo '</div>';
  echo '</div>';
  echo '<label for="inputText" class="col-sm-2 col-form-label">Full Name as per Aadhar card</label>';
  echo '<div class="col-sm-10">';
  echo '<div class="input-group">';
  echo '<label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>';
  echo '<div class="col-sm-10">';
  echo '<input type="text" class="form-control" name="full_name" value="' . $row["full_name"] . '">';
  echo '</div>';
  echo '</div>';
  echo '<div class="input-group">';
  echo '<input type="number" class="form-control" name="phone_number" value="' . $row["phone_number"] . '">';
  echo '</div>';
  echo '</div>';
  echo '<div class="input-group">';
  echo '<label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>';
  echo '<label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>';
  echo '<div class="col-sm-10">';
  echo '<div class="col-sm-10">';
  echo '<input type="number" class="form-control" name="phone_number" value="' . $row["phone_number"] . '">';
  echo '</div>';
  echo '</div>';
  echo '<div class="input-group">';
  echo '<input type="date" class="form-control" name="date_of_birth" value="' . $row["date_of_birth"] . '">';
  echo '</div>';
  echo '</div>';
  echo '<button type="submit" class="btn btn-primary">Update</button>';
  echo '</form>';
  echo '<label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>';
  echo '<div class="col-sm-10">';
} else {
  echo 'No personal details found';
}

// Close the result and the database connection
$result->close();
$stmt->close();
$conn->close();

?>