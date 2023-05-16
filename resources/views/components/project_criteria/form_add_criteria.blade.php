<div class="container form-add-criteria-container d-none">
    <h5>Create new criteria for project</h5>
    <form action="{{ route('myProject.create') }}" method="POST">
        @csrf
        <div class="row list-criteria">
            <div class="row criteria-elem mb-3">
                <div class="col-md-11">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Note:</label>
                        <input type="text" class="form-control" id="note" placeholder="Enter note" name="note[]">
                    </div>
                    <select class="form-select" data-placeholder="Choose criteria" multiple>
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
                <div class="col-md-1 d-flex align-items-center mt-3 text-danger hide delete-icon" id="delete">
                    <i class="bi bi-trash3-fill"></i>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
</div>