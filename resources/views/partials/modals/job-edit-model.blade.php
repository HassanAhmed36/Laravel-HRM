 @if (isset($job))
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Edit Job</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('job.update', ['id' => $job->id]) }}" method="POST">
                 @csrf
                 <div class="modal-body row">
                     <div class="col-4">
                         <label for="" class="form-label">Job title</label>
                         <input type="text" name="title" class="form-control" placeholder="Enter Job title"
                             required value="{{ $job->title }}">
                     </div>
                     <div class="col-4 mb-3">
                         <label for="" class="form-label">salary</label>
                         <input type="text" name="salary" class="form-control" placeholder="Enter Salary" required
                             value="{{ $job->salary }}">
                     </div>
                     <div class="col-4 mb-3">
                         <label for="" class="form-label">location</label>
                         <input type="text" name="location" class="form-control" placeholder="Enter location"
                             required value="{{ $job->location }}">
                     </div>
                     <div class="col-4 mb-3">
                         <label for="" class="form-label">position avalible</label>
                         <input type="number" name="positions_available" class="form-control"
                             placeholder="Enter avalible position" required value="{{ $job->positions_available }}">
                     </div>
                     <div class="col-4 mt-4 pt-2">
                         <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                             <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd" checked
                                 name="is_active" value="1" @checked($job->is_active)>
                             <label class="form-check-label" for="SwitchCheckSizemd">is active</label>
                         </div>
                     </div>
                     <div class="col-12 mb-3">
                         <label for="" class="form-label">Description</label>
                         <textarea name="description" rows="4" class="form-control">{{ $job->description }}</textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary waves-effect"
                         data-bs-dismiss="modal">Close</button>
                     <button class="btn btn-primary waves-effect waves-light" type="submit">Update
                         Job</button>
                 </div>
             </form>
         </div>
     </div>
 @endif
