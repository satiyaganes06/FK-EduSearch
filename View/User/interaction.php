<?php
include("../../Config/database_con.php");
?>
<!-- LIKE -->
<div class="d-flex">
    <form method="POST">
        <div div id="like<?php echo $posting_id; ?>" class="like-button pr-2">
            <button type="submit" name="buttonlike<?php echo $posting_id; ?>"><i id="iconLike<?php echo $posting_id; ?>" class="fa-regular fa-heart fa-l"></i></button>
        </div>
    </form>
    <script>
        // Get the like button element for the current posting
        var likeButton = document.querySelector("#like<?php echo $posting_id; ?> button");

        // Add a click event listener to the like button
        likeButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent form submission

            // Get the like icon element for the current posting
            var iconLike = document.querySelector("#iconLike<?php echo $posting_id; ?>");

            // Toggle the classes and change the color
            if (iconLike.classList.contains("fa-regular")) {
                iconLike.classList.remove("fa-regular");
                iconLike.classList.add("fa-solid", "red");
                document.getElementById("out<?php echo $posting_id; ?>").innerHTML = "hai";
            } else {
                iconLike.classList.remove("fa-solid", "red");
                iconLike.classList.add("fa-regular");
                document.getElementById("out<?php echo $posting_id; ?>").innerHTML = "";
            }

            // You can also update the like count here if needed
        });
    </script>
    <div class="likeCounter">
        <p><?php echo $row['posting_like'] ?> Like</p>
        <p id="out<?php echo $posting_id; ?>"></p>
    </div>
</div>

<?php
if (isset($_POST['buttonlike' . $posting_id])) {
    $sql5 = "INSERT INTO posting_like (user_id, posting_id) VALUES ('$id', '$posting_id')";
    if (!$result5 = mysqli_query($conn, $sql5)) {
        echo 'Not inserted';
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- TRACK VIEW INSIGHT -->

<div class="views">
    <i id="viewButton" class="fa-solid fa-eye fa-l"></i>
</div>
<div class="viewCounter">
    <p><?php echo $row['posting_view']; ?> View</p>
</div>
<?php
$sql6 = "UPDATE posting SET posting_view = posting_view + 1 WHERE posting_id = '$posting_id'";
mysqli_query($conn, $sql6);
?>