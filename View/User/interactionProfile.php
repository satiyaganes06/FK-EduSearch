<?php
include("../../Config/database_con.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_POST['liked'])) {
        $postID = $_POST['postID'];
        $resultLike = mysqli_query($conn, "SELECT * FROM posting WHERE posting_id = '$postID'");
        $rowLike = mysqli_fetch_array($resultLike);
        $n = $rowLike['posting_like'];
    
        // Check if the user has already liked the post
        $likedResult = mysqli_query($conn, "SELECT * FROM posting_like WHERE user_id = '$user_id' AND posting_id = '$postID'");
        if (mysqli_num_rows($likedResult) == 0) {
            mysqli_query($conn, "UPDATE posting SET posting_like = $n+1 WHERE posting_id = '$postID'");
            mysqli_query($conn, "INSERT INTO posting_like (user_id, posting_id) VALUES ('$user_id', '$postID')");
        }
    }
    
    
    if (isset($_POST['unliked'])) {
        $postID = $_POST['postID'];
        $resultLike = mysqli_query($conn, "SELECT * FROM posting WHERE posting_id = '$postID'");
        $rowLike = mysqli_fetch_array($resultLike);
        $n = $rowLike['posting_like'];
    
        // Check if the user has previously liked the post
        $likedResult = mysqli_query($conn, "SELECT * FROM posting_like WHERE user_id = '$user_id' AND posting_id = '$postID'");
        if (mysqli_num_rows($likedResult) > 0) {
            mysqli_query($conn, "UPDATE posting SET posting_like = $n-1 WHERE posting_id = '$postID'");
            mysqli_query($conn, "DELETE FROM posting_like WHERE user_id = '$user_id' AND posting_id = '$postID'");
        }
    }
}
?>

<!-- LIKE -->
<div class="d-flex">
    <div id="like<?php echo $posting_id; ?>" class="like-button pr-2">
        <?php 
        $likedResult = mysqli_query($conn, "SELECT * FROM posting_like WHERE user_id = '$user_id' AND posting_id = '$posting_id'");
        if (mysqli_num_rows($likedResult) == 1) { ?>

            <!-- user already likes post -->
            <span class="unlike fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: red;"></span>
            <span class="like hide fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: grey;"></span>

        <?php } else { ?>

            <!-- user has not yet liked post -->
            <span class="like fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: grey;"></span>
            <span class="unlike hide fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: red;"></span>

        <?php } ?>
    </div>
    <span class="likes_count">
        <p><?php echo $row2['posting_like'] ?> Like</p>
    </span>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.like', function(event) {
            event.preventDefault(); // Prevent form submission and page refresh

            var postID = $(this).data('id');
            $post = $(this);

            $.ajax({
                url: 'profile.php',
                type: 'POST',
                data: {
                    liked: 1,
                    postID: postID
                },
                success: function(response) {
                    $post.addClass('hide');
                    $post.siblings().removeClass('hide');
                    console.log(response);
                }
            });
        });

        $(document).on('click', '.unlike', function(event) {
            event.preventDefault(); // Prevent form submission and page refresh

            var postID = $(this).data('id');
            $post = $(this);

            $.ajax({
                url: 'profile.php',
                type: 'POST',
                data: {
                    unliked: 1,
                    postID: postID
                },
                success: function(response) {
                    $post.addClass('hide');
                    $post.siblings().removeClass('hide');
                    console.log(response);
                }
            });
        });
    });
</script>

<!-- TRACK VIEW INSIGHT -->
<div class="views" >
    <i id="viewButton" class="pl-3 fa-solid fa-eye fa-l"></i>
</div>
<div class="viewCounter pr-3">
    <p><?php echo $row2['posting_view']; ?> View</p>
</div>