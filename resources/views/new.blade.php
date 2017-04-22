
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <style>
     .k{
       border-width: inherit;
     }
     .table-inverse{
       background-color: #D8D8D8;
       color: #424242;
     }
     .container {
width: 1600px;
}
 </style>
  </head>



<body>
  <div class="container ">

<a href="all">back</a>
<div class="row">
    <div class="col-md-12 offset-0">
      <table class="table">
        <thead class="table-inverse">
          <tr>
            <!--<th>new ID</th>
            <th>Admin ID</th>-->
            <th>หัวข่าว</th>
            <th>เนื้อหา</th>
            <th>ประเภท</th>
            <th>วันที่</th>
          <!--  <th>updated_at</th>-->
          </tr>
        </thead>
        <tbody>
          @foreach($news as $new)
          <tr>
        <!--    <td>{{--{{$new->news_id}}</td>
            <td>{{$new->admin_id}}--}}</td>-->
            <td width='350px' style="padding-right:10px">{{$new->head_News}}</td>
            <td width='700px' style="padding-right:10px">{{$new->content}}</td>
             @if($new->news_type==1)
            <td width='100px' style="padding-right:10px">ข่าวด่วน</td>
            @else
              <td>ข่าวทั่วไป</td>
            @endif

            <td>{{$new->created_at}}</td>
          <!--  <td>{{--{{$new->updated_at}}--}}</td>-->

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
</div>
</body>

</html>
