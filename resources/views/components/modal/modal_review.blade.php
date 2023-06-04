<!-- Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('review', ['id' => $product->id]) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Write review</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger mb-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="mb-3">
                        <h5>Review rating: </h5>
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5"><label
                                for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label
                                for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label
                                for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label
                                for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label
                                for="1">☆</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5>
                            <label for="message-text" class="col-form-label">Write review:</label>
                        </h5>
                        <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" id="message-text" name="content" style="height: 200px;"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send review</button>
                </div>
            </form>
        </div>
    </div>
</div>
