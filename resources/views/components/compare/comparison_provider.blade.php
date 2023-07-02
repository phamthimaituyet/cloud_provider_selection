@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

<h2 class="my-4">{{ $providers[0]->name }} and {{ $providers[1]->name }}</h2>
<div class="row">
    @foreach ($providers as $key => $provider) 
    <div class="col-6">
        <div class="tab-pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" style="margin-bottom: 100px;">
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex">
                    <img src="{{ '/' . $provider->img_url }}" alt=""  style="width: 200px; height: 150px;"/>
                    <div class="ms-2">
                        <p class="mt-5 fs-3" style="color: #2e94bf;">{{ $provider->name }}</p>
                        <p class="mt-3">{{ $provider->phone }}</p>
                    </div>
                </div>
                <div class="ms-5 mt-3">
                    <h3>About This Provider</h3>
                    <p class="mt-3" style="height: 300px;">{{ $provider->description }}</p>
                    <h3 class="mt-5">Headquarters</h3>
                    <p class="mt-3">{{ $provider->address }}</p>
                </div>
            </div>
        </div>        
    </div>
    @endforeach
</div>
