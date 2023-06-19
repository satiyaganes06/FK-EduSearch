<!-- Edit Modal -->
<div id="editModal<?php echo $row['complaint_id'] ?>" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Complaint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../../Model/Complaint/updateComplaint.php" id="edit-form" method="POST">
                    <input type="hidden" name="complaint_id" value="<?php echo $row['complaint_id'] ?>">
                    <div class="form-group">
                        <label class="form-label" for="title">Posting Title</label>
                        <input type="text" class="form-control" value="<?php echo $row['posting_title'] ?>" disabled></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="title">Posting Content</label>
                        <textarea class="form-control" name="content" rows="4" disabled><?php echo $row['posting_content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="type">Type of Complaints<span style="color: red;"> *</span></label>
                        <select class="form-select" name="typeComplaint" required="required">
                            <option value="">Please Select...</option>
                            <option value="1" <?php if ($row['complaint_type'] === "Unsatisfied Expert's Feedback") echo 'selected = "selected"'; ?>>Unsatisfied Expert's Feedback</option>
                            <option value="2" <?php if ($row['complaint_type'] === "Wrongly Assigned Research Area") echo 'selected = "selected"'; ?>>Wrongly Assigned Research Area</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="desc">Brief Description<span style="color: red;"> *</span></label>
                        <textarea class="form-control" name="desc" rows="4" required><?php echo $row['complaint_description'] ?></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div id="viewModal<?php echo $row['user_id'] ?><?php echo $row['complaint_id'] ?>" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Complaint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>" class="form-control" readonly />
                    <input type="hidden" name="user_id" value="<?php echo $row['complaint_id'] ?>" class="form-control" readonly />
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="<?php echo $row['user_name'] ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" id="email" class="form-control" value="<?php echo $row['user_email'] ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date">Date</label>
                        <input type="text" id="date" class="form-control" value="<?php echo $row['complaint_date'] ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="time">Time</label>
                        <input type="text" id="time" class="form-control" readonly value="<?php echo $row['complaint_time'] ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phoneNum">Phone Number</label>
                        <input type="tel" id="phoneNum" class="form-control" readonly value="<?php echo $row['user_phoneNum'] ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="title">Post Title</label>
                        <input type="text" id="title" class="form-control" readonly value="<?php echo $row['posting_title'] ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="content">Post Content</label>
                        <textarea class="form-control" name="content" rows="4" readonly><?php echo $row['posting_content']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="complaintType">Type of Complaint</label>
                        <input type="text" id="complaintType" class="form-control" readonly value="<?php echo $row['complaint_type'] ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="desc">Brief Description</label>
                        <textarea class="form-control" name="desc" rows="4" readonly><?php echo $row['complaint_description']; ?></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->

<div id="deleteModal<?php echo $row['complaint_id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form action="../../Model/Complaint/deleteComplaint.php" method="POST">
                            <input type="hidden" name="complaint_id" value="<?php echo $row['complaint_id']; ?>"/>
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
