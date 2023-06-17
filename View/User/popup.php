<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-vtXXFdAEk8/pAIvONy0eP/Hz4FA/8mlwXy8cGwphHG25XMyttLkMp3G+upD4+jqU" crossorigin="anonymous">
    <style>
        .rating {
            display: inline-flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 2rem;
            color: lightgray;
            cursor: pointer;
        }

        .rating input[type="radio"]:checked~label {
            color: gold;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Delete Modal -->
    <div id="deleteQues<?php echo $posting_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 ">
                            <div class="row">
                                <div class="col ml-auto">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <p class="font-weight-bold mb-2">Are you sure you want to delete this?</p>
                            <p class="text-muted">This process cannot be undone.</p>
                        </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                            <form action="../../Model/User/deletePosting.php" method="POST">
                                <input type="hidden" name="posting_id" value="<?php echo $posting_id ?>" />
                                <div class="row justify-content-end no-gutters">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-light text-muted mr-2" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="delete" class="btn btn-danger px-4">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Close case -->
    <div id="closeCase<?php echo $posting_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 ">
                            <div class="row">
                                <div class="col ml-auto">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <p class="font-weight-bold mb-2">Are you sure you want to close this case?</p>
                            <p class="text-muted">This process cannot be undone.</p>
                        </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                            <form action="../../Model/User/updateStatus.php" method="POST">
                                <input type="hidden" name="posting_id" value="<?php echo $posting_id ?>" />
                                <div class="row justify-content-end no-gutters">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-light text-muted mr-2" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="confirm" class="btn btn-danger px-4">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rate Posting -->
    <div id="ratePosting<?php echo $posting_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
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
                            <form action="../../Model/User/ratePosting.php" method="POST">
                                <input type="hidden" name="posting_id" value="<?php echo $posting_id ?>" />
                                <p class="font-weight-bold mb-2">Rate for satisfaction of expert answer your question</p>
                                <div class="rating col">
                                    <input type="radio" name="rating" value="5" id="5">
                                    <label for="5"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rating" value="4" id="4">
                                    <label for="4"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rating" value="3" id="3">
                                    <label for="3"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rating" value="2" id="2">
                                    <label for="2"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rating" value="1" id="1">
                                    <label for="1"><i class="fas fa-star"></i></label>
                                </div>
                                <div class="row justify-content-end no-gutters">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-light text-muted mr-2" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="rate" class="btn btn-danger px-4">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>