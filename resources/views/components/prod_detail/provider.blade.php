<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" style="margin-bottom: 100px;">
    <div class="d-flex">
        <div class="border-end pe-3" style="width: 25%; min-width: 25%;">
            <img src={{ $product->vendor->img_url }} alt="" style="height: 150px;" />
            <p class="mt-5 fs-3" style="color: #2e94bf;">{{ $product->vendor->name }}</p>
            <p class="mt-3">{{ $product->vendor->phone }}</p>
        </div>
        <div class="ms-5">
            <h1 style="font-weight: 400; color: #0e7f74;">About This Provider</h1>
            <p class="mt-3">{{ $product->vendor->description }}</p>
            <h3 class="mt-5" style="font-weight: 400; color: #0e7f74;">Headquarters</h3>
            <p class="mt-3">{{ $product->vendor->address }}</p>
        </div>
    </div>
</div>
