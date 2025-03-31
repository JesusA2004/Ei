<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" 
           value="{{ old('title', isset($product) ? $product->title : '') }}" required>
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" required>{{ old('description', isset($product) ? $product->description : '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" id="price" class="form-control" step="0.01"
           value="{{ old('price', isset($product) ? $product->price : '') }}" required>
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="category">Category</label>
    <input type="text" name="category" id="category" class="form-control"
           value="{{ old('category', isset($product) ? $product->category : '') }}" required>
    @error('category')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image URL</label>
    <input type="text" name="image" id="image" class="form-control"
           value="{{ old('image', isset($product) ? $product->image : '') }}">
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
