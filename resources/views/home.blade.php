@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<script src="public/js/jquery-2.2.1.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

	{{--<div class="container spark-screen">--}}
		{{--<div class="row">--}}
			{{--<div class="col-md-10 col-md-offset-1">--}}
				{{--<div class="panel panel-default">--}}
					{{--<div class="panel-heading">Chat Message Module</div>--}}
					{{--<div class="panel-body">--}}

						{{--<div class="row">--}}
							{{--<div class="col-lg-8" >--}}
								{{--<div id="messages" ></div>--}}
							{{--</div>--}}
							{{--<div class="col-lg-8" >--}}
								{{--<form action="sendmessage" method="POST">--}}
									{{--<input type="hidden" name="_token" value="{{ csrf_token() }}" >--}}
									{{--<input type="hidden" name="user" value="{{ Auth::user()->firstname }}" >--}}
									{{--<textarea class="form-control msg"></textarea>--}}
									{{--<br/>--}}
									{{--<input type="button" value="Send" class="btn btn-success send-msg">--}}
								{{--</form>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}

	<div class="col-md-3">
		<!-- DIRECT CHAT PRIMARY -->
		<div class="box box-primary direct-chat direct-chat-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Direct Chat</h3>

				<div class="box-tools pull-right">
					<span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
						<i class="fa fa-comments"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Conversations are loaded here -->
				<div class="direct-chat-messages">
					<!-- Message. Default to the left -->
					<div class="direct-chat-msg">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-left">Alexander Pierce</span>
							<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							Is this template really for free? That's unbelievable!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->

					<!-- Message to the right -->
					<div class="direct-chat-msg right" id="messages">
						{{--<div class="direct-chat-info clearfix">--}}
							{{--<span class="direct-chat-name pull-right" id="user"></span>--}}
							{{--<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>--}}
						{{--</div>--}}
						{{--<!-- /.direct-chat-info -->--}}
						{{--<img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->--}}
						{{--<div class="direct-chat-text">--}}

						{{--</div>--}}
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
				</div>
				<!--/.direct-chat-messages-->


			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<form action="sendmessage" method="post">
					<div class="input-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="my_id" value="{{ Auth::user()->id }}">
						<input type="hidden" name="user_name" value="{{ Auth::user()->firstname }}">
						<input type="text" placeholder="Type Message ..." class="form-control msg">
                      <span class="input-group-btn">

						  <input type="button" value="Send" class="btn btn-primary btn-flat send-msg">
                      </span>
					</div>
				</form>
			</div>
			<!-- /.box-footer-->
		</div>
		<!--/.direct-chat -->
	</div>
	<!-- /.col -->

	<script>
		var socket = io.connect('http://localhost:8890');
		socket.on('message', function (data) {
			data = jQuery.parseJSON(data);
			console.log(data);
			if(data.user_id == $("input[name='my_id']").val() || data.my_id == $("input[name='my_id']").val() ) {
				$("#messages").append(
						"<div style='clear: both;'></div><div class='direct-chat-info clearfix'> <span class='direct-chat-name pull-right' id='user'>"
						+ data.user_name + "</span> </div>"
						+ "<img class='direct-chat-img' src='../dist/img/user3-128x128.jpg' alt='Message User Image'><div class='direct-chat-text'>" + data.message + "</div>");
			}
		});
		$(".send-msg").click(function(e){
			e.preventDefault();
			var token = $("input[name='_token']").val();
			var my_id = $("input[name='my_id']").val();
			var user_id = '2';//$("input[name='user_id']").val();
			var user_name = $("input[name='user_name']").val();
			var msg = $(".msg").val();
			if(msg != ''){
				$.ajax({
					type: "POST",
					url: '{!! URL::to("sendmessage") !!}',
					dataType: "json",
					data: {'_token':token,'message':msg,'user_name':user_name,'user_id':user_id, 'my_id':my_id},
					success:function(data){
						console.log(data);

						$(".msg").val('');
					}
				});
			}else{
				alert("Please Add Message!");
			}
		})
	</script>
@endsection
