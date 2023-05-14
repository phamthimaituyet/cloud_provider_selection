<div class="container form-add-criteria-container d-none mt-3">
    <form action="{{ route('myProject.createCriteria', ['id' => $project->id]) }}" method="POST">
        @csrf
        <div class="list-criteria">
            <div class="criteria-elem">
                <div class="">
                    <div class="mb-3">
                        <label for="name" class="col-form-label fw-bold text-danger float-start">Note:</label>
                        <div class="align-items-center text-danger delete-icon float-end" id="delete" style="margin-top: 14px;">
                            <i class="bi bi-trash3-fill"></i>
                        </div>
                        <textarea class="form-control" id="note" placeholder="Enter note" name="note[]"></textarea>
                    </div>
                    <select class="form-select" data-placeholder="Choose criteria" name="criteria_id[0][]" multiple>
                        <option></option>
                        @foreach($parent_criterias as $parent_criteria)
                            <?php $childs = in_array($parent_criteria->name, ['Cost', 'Capability']) ? [$parent_criteria] : $parent_criteria->children ?>
                            <optgroup label="{{ $parent_criteria->name }}">
                                @foreach ($childs as $child)
                                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary mt-2 ms-3">Submit</button>
        </div>
    </form>
</div>
