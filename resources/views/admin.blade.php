<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
  </head>
  <body style="align-content: center;padding: 10%; text-align: center;">
    <h2>Admin</h2>
    <form  action="{{ route('adminid.check')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row" style="align:center">
          <div class="col-md-6">
            ID <input type="text" name="adminid" id="adminid" placeholder="admin"><br>
            PW <input type="password" name="adminpw" id="adminpw" placeholder="1231"><br>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success">LOGIN</button>
          </div>
        </div>
    </form>
    <a href="{{route('Cursor')}}">Go to Cursor Page</a>
  </body>
</html>
