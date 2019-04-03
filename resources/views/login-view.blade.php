<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <body>

       @if($message = Session::get('error'))

       {{$message}}

       @endif


        @if (count($errors)>0)
          
          <div class="alert alert-danger">
            <ul>
                @foreach($errors->all as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
          </div>

        @endif

        <form method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>User Name</label>
                <input type="email" name="email" class="form-control"/>
            </div>
            <div class="form-group">
                <label>User Name</label>    
                <input type="password" name="password"/>
            </div>    
                <input type="submit" value="login" name="login"/>
            </div>    
        </form>

    </body>
</html>
