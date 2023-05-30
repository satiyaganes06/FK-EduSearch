<!-- Edit Modal -->
<div id="editModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Complaint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-label" name="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="James Cooper" disabled />
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="jamescooper@gmail.com" disabled />
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="date">Date</label>
                        <input type="date" id="date" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="phoneNum">Phone Number</label>
                        <input type="tel" id="phoneNum" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="type">Type of Complaints</label>
                        <select class="form-select" aria-label="typeComplaint">
                            <option selected>Please Select...</option>
                            <option value="1">Unsatisfied Expert's Feedback</option>
                            <option value="2">Wrongly Assigned Research Area</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="desc">Brief Description</label>
                        <textarea class="form-control" id="desc" rows="4"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->


<!-- Delete Modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body p-0">
                <div class="card border-0 p-sm-3 p-2 justify-content-center">
                    <div class="card-header pb-0 bg-white border-0 ">
                        <div class="row">
                            <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                        </div>
                        <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p>
                        <p class="text-muted ">This process cannot be undone.</p>
                    </div>
                    <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                        <div class="row justify-content-end no-gutters">
                            <div class="col-auto"><button type="button" class="btn btn-light text-muted mr-2" data-dismiss="modal">Cancel</button></div>
                            <div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>