


<a href="admin">back</a>
<div class="row">
    <div class="col-md-12 offset-0">
      <table class="table">
        <thead class="table-inverse">
          <tr>
            <th>new ID</th>
            <th>Admin ID</th>
            <th>head_News</th>
            <th>content</th>
            <th>news_type</th>
            <th>created_at</th>
            <th>updated_at</th>
          </tr>
        </thead>
        <tbody>
          @foreach($news as $new)
          <tr>
            <td>{{$new->news_id}}</td>
            <td>{{$new->admin_id}}</td>
            <td>{{$new->head_News}}</td>
            <td>{{$new->content}}</td>
            <td>{{$new->news_type}}</td>
            <td>{{$new->created_at}}</td>
            <td>{{$new->updated_at}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
