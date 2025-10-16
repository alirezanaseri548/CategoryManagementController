<h1>Create Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
  @csrf
  <input type="text" name="name" placeholder="Category name">
  <select name="category_id">
  @foreach(App\Models\Category::all() as $cat)
    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
  @endforeach
</select>

  <button type="submit">Save</button>
</form>
