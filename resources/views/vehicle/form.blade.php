<div class="col-md-6">
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="Brand" value="{{ old('brand') ?? $vehicle->brand}}" autocomplete="off">
        <label for="floatingInput">Brand</label>
    </div>
</div>
<div class="col-md-6">
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" placeholder="Model" value="{{ old('model') ?? $vehicle->model}}" autocomplete='off'>
        <label for="floatingInput">Model</label>
    </div>
</div>
<div class="col-12">
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="description" value="{{ old('description') ?? $vehicle->description }}">
        <label for="floatingInput">Descritpion</label>
    </div>
</div>
<div class="col-md-6">
    <div class="form-floating mb-3">
        <input type="number" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" placeholder="Cost" value="{{ old('cost') ?? $vehicle->cost }}">
        <label for="floatingInput">Cost</label>
    </div>

</div>
<div class="col-md-6">
    <div class="form-floating mb-3">
        
        <input type="file" class="form-control @error('img_url') is-invalid @enderror" id="img_url" name="img_url" placeholder="image">
        <label for="floatingInput">Image</label>
    </div>
</div>
 

@csrf
