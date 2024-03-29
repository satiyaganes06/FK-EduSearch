<?php
include("../../Config/database_con.php");
?>

<!-- LIKE -->
<div class="d-flex">
    <div id="like<?php echo $posting_id; ?>" class="like-button pr-2">
        <?php 
        $likedResult = mysqli_query($conn, "SELECT * FROM posting_like WHERE user_id = '$id' AND posting_id = '$posting_id'");
        if (mysqli_num_rows($likedResult) == 1) { ?>

            <!-- user already likes post -->
            <span class="unlike fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: red;" onClick="location.reload();"></span>
            <span class="like hide fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: grey;" onClick="location.reload();"></span>

        <?php } else { ?>

            <!-- user has not yet liked post -->
            <span class="like fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: grey;" onClick="location.reload();"></span>
            <span class="unlike hide fa-solid fa-heart fa-l" data-id="<?php echo $posting_id; ?>" style="color: red;" onClick="location.reload();"></span>

        <?php } ?>
    </div>
    <span class="likes_count">
        <p><?php echo $row['posting_like'] ?> Like</p>
    </span>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.like', function(event) {
            event.preventDefault(); // Prevent form submission and page refresh

            var postID = $(this).data('id');
            $post = $(this);

            $.ajax({
                url: 'posting.php',
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
                url: 'posting.php',
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
    <p><?php echo $row['posting_view']; ?> View</p>
</div>
<?php
$sql6 = "UPDATE posting SET posting_view = posting_view + 1 WHERE posting_id = '$posting_id' AND user_id != '$id'";
mysqli_query($conn, $sql6);
?>