<h1>لیست پست‌ها</h1>

<table border="1" cellpadding="8">
  <thead>
    <tr>
      <th>عنوان</th>
      <th>متن</th>
      <th>دسته‌بندی</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
        <td>{{ $post->category->name }}</td> <!-- 👈 اینجا باید بذاریش -->
      </tr>
    @endforeach
  </tbody>
</table>
