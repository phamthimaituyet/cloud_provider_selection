<form action="{{ route('myProject.updateNote', ['project_id' => $project->id, 'note_id' => $note->id]) }}" method="POST">
    @csrf
    <div class="container my-3 shadow-none p-3 mb-5 bg-light rounded">
        <div class="list-criteria">
            <div class="criteria-elem">
                <div class="">
                    <div class="mb-3">
                        <label for="note" class="col-form-label fw-bold text-danger float-start">Requirements:</label>
                        <textarea class="form-control" id="note" placeholder="Enter note" name="note"><?= isset($note) ? trim($note->note) : ''  ?></textarea>
                        <div id="emailHelp" class="form-text">Please enter requirements, wishes for the project.</div>
                    </div>
                    <div class="mb-3 question-component">
                        <div class="d-flex">
                            <label for="mondai" class="form-label fw-bold text-danger float-start" style="width: 90%;">Questions:</label>
                        </div>
                        @foreach ($note->questions as $key => $question)
                            <div class="form-question mt-3">
                                <input type="text" class="form-control mb-3" name="question[]" id="mondai" placeholder="Enter Question" value="{{ $question->question }}" >
                                <select class="form-select" data-placeholder="Choose criteria" name="criteria_id[{{ $key }}][]" multiple>
                                    <option></option>
                                    @foreach($parent_criterias as $parent_criteria)
                                        <?php $childs = in_array($parent_criteria->name, ['Cost', 'Capability']) ? [$parent_criteria] : $parent_criteria->children ?>
                                        <optgroup label="{{ $parent_criteria->name }}">
                                            @foreach ($childs as $child)
                                                <option value="{{ $child->id }}" {{ in_array($child->id, $question->questionCriterias->pluck('criterias_id')->toArray()) ? 'selected' : '' }}>{{ $child->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <div id="emailHelp" class="form-text">Create questions and choose the answer criteria for that question.</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary mt-2 me-3">Submit</button>
    </div>
</form>