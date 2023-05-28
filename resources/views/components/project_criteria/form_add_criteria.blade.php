<form action="{{ route('myProject.addNote', ['id' => $project->id]) }}" method="POST">
    @csrf
    <div class="container my-3 shadow-none p-3 mb-5 bg-light rounded">
        <div class="list-criteria">
            <div class="criteria-elem">
                <div class="">
                    <div class="mb-3">
                        <label for="note" class="col-form-label fw-bold text-danger float-start">Requirements:</label>
                        <textarea class="form-control" id="note" placeholder="Enter note" name="note"></textarea>
                        <div id="emailHelp" class="form-text">Please enter requirements, wishes for the project.</div>
                    </div>
                    <div class="mb-3 question-component">
                        <div class="d-flex">
                            <label for="mondai" class="form-label fw-bold text-danger float-start" style="width: 90%;">Questions:</label>
                            <div class="d-flex mb-2 add-question">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                <p class="ms-2 text-danger">Add question</p>
                            </div>
                        </div>
                        <div class="form-question mt-3">
                            <input type="text" class="form-control mb-3" name="question[]" id="mondai" placeholder="Enter Question">
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
                            <div id="emailHelp" class="form-text">Create questions and choose the answer criteria for that question.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary mt-2 me-3">Submit</button>
    </div>
</form>

