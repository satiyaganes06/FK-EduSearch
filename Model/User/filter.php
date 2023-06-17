<head>
    <style>
        .radio-tiles {
            display: flex;
            flex-wrap: wrap;
        }

        .radio-tiles input[type="radio"] {
            display: none;
        }

        .radio-tiles label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            margin: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .radio-tiles input[type="radio"]:checked+label {
            background-color: lightgray;
            color: #fff;
        }
    </style>
</head>
<div class=box1><button>
        <a class="dropdown-item" href="#filter<?php echo $row_modal['posting_id'] ?>" data-toggle="modal"><i class="fa-solid fa-filter" style="color: #757D8A;"></i></a>
    </button>
</div>

<!-- Filter -->
<div id="filter<?php echo $row_modal['posting_id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body p-0">
                <div class="card border-0 p-sm-3 p-2">
                    <div class="card-header pb-0 bg-white border-0 ">
                        <div class="row">
                            <div class="col ml-auto">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                        <form action="" method="POST">
                            <input type="hidden" name="posting_id" value="<?php echo $posting_id ?>" />
                            <div class="row justify-content-end no-gutters">
                                <p class="font-weight-bold mb-2">Status</p>
                                <div class="d-flex radio-tiles justify-content-center">
                                    <input type="radio" id="completed" name="status" value="Completed" />
                                    <label for="completed">
                                        <div class="rounded-circle mr-2" style="width:20px;height:20px;background-color: #84D17E;"></div>
                                        <p class="text-muted pl-2 pt-2"> Completed </p>
                                    </label>
                                    <input type="radio" id="Revised" name="status" value="Revised" />
                                    <label for="Revised">
                                        <div class="rounded-circle mr-2" style="width:20px;height:20px;background-color: #DFF45C;"></div>
                                        <p class="text-muted pl-2 pt-2"> Revised </p>
                                    </label>
                                    <input type="radio" id="Accepted" name="status" value="Accepted" />
                                    <label for="Accepted">
                                        <div class="rounded-circle mr-2" style="width:20px;height:20px;background-color: #3E9BA8;"></div>
                                        <p class="text-muted pl-2 pt-2"> Accepted </p>
                                    </label>
                                    <input type="radio" id="Assign" name="status" value="Assign" />
                                    <label for="Assign">
                                        <div class="rounded-circle mr-2 border" style="width:20px;height:20px;background-color: #FFFFFF;"></div>
                                        <p class="text-muted pl-2 pt-2"> Assign </p>
                                    </label>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-light text-muted mr-2" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="clear" class="btn btn-light px-4" data-dismiss="modal">Clear</button>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="filter" class="btn btn-danger px-4">Apply Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include("../../Config/database_con.php");

if (isset($_POST['filter'])) {

    $id = $_POST['posting_id'];
    $status = $_POST['status'];
    if(!empty($_POST['status'])) {
        $sql = "SELECT user_profile.*, posting.* FROM user_profile 
                INNER JOIN posting ON user_profile.user_id = posting.user_id
                WHERE posting_course='$researchArea' AND posting_status = '$status'";
        $result = mysqli_query($conn, $sql) or die("Could not execute query in view");
    } else {
        ?>
            <script>
                alert("Please select the value!");
                window.history.back();
            </script>
        <?php
    }
} 
if (isset($_POST['clear'])) {

    $id = $_POST['posting_id'];
    $sql = "SELECT user_profile.*, posting.* FROM user_profile 
            INNER JOIN posting ON user_profile.user_id = posting.user_id
            WHERE posting_course='$researchArea'";
    $result = mysqli_query($conn, $sql) or die("Could not execute query in view");
}
?>