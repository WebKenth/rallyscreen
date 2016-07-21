@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="fancy-button">
                                  <div class="left-frills frills"></div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                  <div class="right-frills frills"></div>
                                </div>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:900);


.button {
  background: #eb1f48;
  border-radius: 5px;
  color: white;
  cursor: pointer;
  font-family: Roboto;
  font-size: 1.9em;
  height: 65px;
  letter-spacing: .2px;
  line-height: 65px;
  text-align: center;
  text-transform: uppercase;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  width: 150px;
}
.button:hover {
  background: #ec3257;
}
.button:active {
  box-shadow: inset 0px 2px 8px -1px #d7143b;
}

.fancy-button {
  margin: auto;
  position: relative;
}

.frills, .frills:after, .frills:before {
  position: absolute;
  background: #eb1f48;
  border-radius: 4px;
  height: 8px;
}

.frills:after, .frills:before {
  content: "";
  display: block;
}

.frills:before {
  bottom: 45px;
}

.frills:after {
  top: 45px;
}

.left-frills {
  top: 15px;
}
.active .left-frills {
  -webkit-animation: move-left 0.38s ease-out, width-to-zero 0.38s ease-out;
          animation: move-left 0.38s ease-out, width-to-zero 0.38s ease-out;
}
.left-frills:before, .left-frills:after {
  left: 15px;
}
.active .left-frills:before {
  -webkit-animation: width-to-zero 0.38s ease-out, move-up 0.38s ease-out;
          animation: width-to-zero 0.38s ease-out, move-up 0.38s ease-out;
}
.active .left-frills:after {
  -webkit-animation: width-to-zero 0.38s ease-out, move-down 0.38s ease-out;
          animation: width-to-zero 0.38s ease-out, move-down 0.38s ease-out;
}

.right-frills {
    left: 120px;
    top: 15px;
}
.active .right-frills {
  -webkit-animation: move-right 0.38s ease-out, width-to-zero 0.38s ease-out;
          animation: move-right 0.38s ease-out, width-to-zero 0.38s ease-out;
}
.right-frills:before, .right-frills:after {
  right: 15px;
}
.active .right-frills:before {
  -webkit-animation: width-to-zero 0.38s ease-out, move-up 0.38s ease-out;
          animation: width-to-zero 0.38s ease-out, move-up 0.38s ease-out;
}
.active .right-frills:after {
  -webkit-animation: width-to-zero 0.38s ease-out, move-down 0.38s ease-out;
          animation: width-to-zero 0.38s ease-out, move-down 0.38s ease-out;
}

.left-frills:before, .right-frills:after {
  -webkit-transform: rotate(34deg);
          transform: rotate(34deg);
}

.left-frills:after, .right-frills:before {
  -webkit-transform: rotate(-34deg);
          transform: rotate(-34deg);
}

@-webkit-keyframes move-left {
  0% {
    -webkit-transform: none;
            transform: none;
  }
  65% {
    -webkit-transform: translateX(-80px);
            transform: translateX(-80px);
  }
  100% {
    -webkit-transform: translateX(-80px);
            transform: translateX(-80px);
  }
}

@keyframes move-left {
  0% {
    -webkit-transform: none;
            transform: none;
  }
  65% {
    -webkit-transform: translateX(-80px);
            transform: translateX(-80px);
  }
  100% {
    -webkit-transform: translateX(-80px);
            transform: translateX(-80px);
  }
}
@-webkit-keyframes move-right {
  0% {
    -webkit-transform: none;
            transform: none;
  }
  65% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
  }
  100% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
  }
}
@keyframes move-right {
  0% {
    -webkit-transform: none;
            transform: none;
  }
  65% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
  }
  100% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
  }
}
@-webkit-keyframes width-to-zero {
  0% {
    width: 38px;
  }
  100% {
    width: 8px;
  }
}
@keyframes width-to-zero {
  0% {
    width: 38px;
  }
  100% {
    width: 8px;
  }
}
@-webkit-keyframes move-up {
  100% {
    bottom: 69.75px;
  }
}
@keyframes move-up {
  100% {
    bottom: 69.75px;
  }
}
@-webkit-keyframes move-down {
  100% {
    top: 69.75px;
  }
}
@keyframes move-down {
  100% {
    top: 69.75px;
  }
}

.fancy-button button {
    height: 50px;
    width: 140px;
    background-color: #eb1f48;
    border-color: #eb1f48;
}
</style>
<script>
    $(function(){
      $(".fancy-button").mousedown(function(){
        $(this).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(){
            $(this).removeClass('active');
        })
         $(this).addClass("active");
      });
    });
</script>
@endsection