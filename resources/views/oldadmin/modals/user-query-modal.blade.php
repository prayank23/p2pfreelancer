<div class="query-response">
    <div id="modal" class="modal show">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Query</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <label for="user">User</label>
                    <p>{{$query->user->name}}</p>
                    <p></p>
                    <label for="query">Query</label>
                    <p>{{$query->query}}</p>
                    <p></p>
                    <label for="status">status</label>
                    <select name="status" id="query-status">
                        <option value="pending" {{$query->status=='pending'?'selected':''}}>pending</option>
                        <option value="approve" {{$query->status=='approve'?'selected':''}}>approve</option>
                        <option value="reject" {{$query->status=='reject'?'selected':''}}>reject</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="savequerystatus({{$query->id}})">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
