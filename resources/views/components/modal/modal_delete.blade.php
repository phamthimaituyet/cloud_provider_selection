<?php
    $route_name = '';
    $option = null;
    $id_name = 'deleteModal';
    if (isset($myProject)) {
        $id_name .= $id;
        $route_name = 'myProject.delete';
        $option['id'] = $myProject->id;
    } else if (isset($project) && isset($note)) {
        $id_name .= $id;
        $route_name = 'myProject.deleteNote';
        $option['project_id'] = $project->id;
        $option['note_id']    = $note->id;
    }
?>

<div class="modal fade" id="{{ $id_name }}" role="dialog" tabindex="-1" aria-labelledby="myProjectLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route($route_name, $option) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <p class="fs-4">Are you sure to delete?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="btn button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
